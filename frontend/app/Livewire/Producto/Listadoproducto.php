<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Listadoproducto extends Component
{
     public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $categoria;
    public $url_img;
  public $modal = false;
  public $Id_producto;
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string|max:500',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'categoria' => 'required|string|max:100',
        'url_img' => 'required|url',
    ];
    public $search;
    public $perPage = 5;
    public $page = 1;
    public $fechaInicio, $fechaFin;
    use WithPagination;
     public function updatingSearch()
    {
        $this->resetPage();
    }
     public function setPage($page)
    {
        $this->page = $page;
    }
    protected $updatesQueryString = ['search']; // opcional: mantener búsqueda en URL

     public function abrirModal($Id_producto)
    {
      

        // Consumir API para obtener los datos del producto
        $response = Http::get("http://localhost:3000/api/productos/{$Id_producto}");

        if ($response->successful()) {
            $producto = $response->json();
              $this->Id_producto = $producto['Id_producto'];;
            $this->nombre = $producto['nombre'];
            $this->descripcion = $producto['descripcion'];
            $this->precio = $producto['precio'];
            $this->stock = $producto['stock'];
            $this->categoria = $producto['categoria'];
            $this->url_img = $producto['url_img'] ?? null;
            $this->modal = true;
        } else {
            session()->flash('error', 'No se pudo obtener la información del producto.');
        }
    }

    public function cerrarModal()
    {
        $this->reset();
        $this->modal = false;
    }

    public function actualizarProducto($Id_producto)
    {
        $this->validate();

        $payload = [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'categoria' => $this->categoria,
            'url_img' => $this->url_img
        ];

        // Consumir API para actualizar
        $response = Http::put("http://localhost:3000/api/productos/{$Id_producto}", $payload);
        if ($response->successful()) {
            LivewireAlert::title('Cambios guardados')
             ->success()
        ->show();
            $this->cerrarModal();
            session()->flash('success', 'Producto actualizado correctamente');
        } else {
             LivewireAlert::title('No se pudo actulizar')
             ->error()
        ->show();
            session()->flash('error', 'Error al actualizar el producto.');
        }
    }
    public function render()
    {
         $url = 'http://localhost:3000/api/productos';

        // Llamada al API
         $response = Http::get($url, ['search' => $this->search]);

                $data = $response->json();

        // Convertir array en colección
        $filtered = collect($data)->filter(function ($item) {
            return stripos($item['nombre'], $this->search) !== false;
        })->values();

        // Paginación manual con Collection
        $offset = ($this->page - 1) * $this->perPage;
        $items = $filtered->slice($offset, $this->perPage);

        $producto = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            $this->perPage,
            $this->page,
            ['path' => url()->current()]
        );
    
        return view('livewire.producto.listadoproducto', compact('producto'));
    }

    public function deleteItem()
{
    try {
        $response = Http::delete("http://localhost:3000/api/productos/{$this->Id_producto}");

        if ($response->successful()) {
            session()->flash('success', "Producto Borrado!!");
           LivewireAlert::title('Cambios guardados')
        ->success()
        ->show();
        $this->reset();
        } else {
            session()->flash('error', "Algo ocurrió en el proceso!!");
             LivewireAlert::title('No se pudo borrar producto')->error()->show();
        }
    } catch (\Exception $e) {
        session()->flash('error', "Algo ocurrió en el proceso!!");
      LivewireAlert::title('No se pudo borrar producto')->error()->show();
    }
}


public function eliminar($id){
    $this->Id_producto=$id;
    LivewireAlert::title('Borrar Producto')
    ->text('Esta seguro de borrar Producto')
    ->asConfirm()
    ->onConfirm('deleteItem')
    ->onDeny('keepItem')
    ->show();
}
public function keepItem()
{
   $this->reset();
    // Keep logic
}
}
