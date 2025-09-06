<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class Listadoclientes extends Component
{
   //  public $search,$idasignatura;
    public $modal=false;
    use WithPagination;
    public $search = '';
    public $perPage = 6;
    public $currentPage = 1; // usamos esta en lugar de $page
    public $idcliente,$nombre,$direccion, $email,$telefono;
    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }

    public function nextPage($total)
    {
        if ($this->currentPage * $this->perPage < $total) {
            $this->currentPage++;
        }
    }
   public $page = 1; // 👈 lo definimos nosotros, no depende de Livewire v2

    public function setPage($page)
    {
        $this->page = $page;
    }
    protected $updatesQueryString = ['search']; // opcional: mantener búsqueda en URL

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $url = 'http://localhost:3000/api/clientes';

        // Llamada al API
         $response = Http::get($url, ['search' => $this->search]);

                $data = $response->json();

        // Convertir array en colección
        $filtered = collect($data)->filter(function ($item) {
            return stripos($item['Nombre'], $this->search) !== false;
        })->values();

        // Paginación manual con Collection
        $offset = ($this->page - 1) * $this->perPage;
        $items = $filtered->slice($offset, $this->perPage);

        $cliente = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            $this->perPage,
            $this->page,
            ['path' => url()->current()]
        );
         //$cliente = Cliente::where('Nombre','LIKE','%'. $this->search . '%')->paginate(7);
        return view('livewire.clientes.listadoclientes', compact('cliente'));
        
    }
    protected $rules = [
        'nombre'=> ['required','min:3'],
        'direccion'=> ['required'],
        'telefono'=> ['required','string'],
        'email'=> ['required','string']
   

    ];
//Validacion dinamica
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function abrirModal($id)
{
    $this->modal = true;

    // Llamar a tu API (usando Http client de Laravel)
    $response = Http::get("http://localhost:3000/api/clientes/{$id}"); // Cambia la URL

if ($response->successful()) {
       
$editacliente = $response->json();
  
        if ($editacliente) {
            $this->idcliente = $editacliente['Id_Cliente'];
            $this->nombre = $editacliente['Nombre'];
            $this->email = $editacliente['Email'];
            $this->direccion = $editacliente['Direccion'];
            $this->telefono = $editacliente['Telefono'];
        } else {
            // Opcional: manejar si no encuentra el cliente
            session()->flash('error', 'Cliente no encontrado');
        }
    } else {
        session()->flash('error', 'Error al conectar con la API');
   }
}

public function update($id)
{
      try {
    // Validación de campos
    $this->validate([
        'nombre' => 'required|string|max:255',
        'direccion' => 'nullable|string',
        'telefono' => 'required',
        'email' => 'required',
    ]);

  
        // Llamada a la API REST para actualizar el registro
        $response = Http::put("http://localhost:3000/api/clientes/{$id}", [
            'Nombre' => $this->nombre,
            'Direccion' => $this->direccion,
            'Telefono' => $this->telefono,
            'Email' => $this->email,
        ]);

        if ($response->successful()) {
LivewireAlert::title('Cambios guardados')
        ->success()
        ->show();
            $this->reset(); // Limpiar propiedades del componente
        } else {
          LivewireAlert::title('No se pudo actualizar')->error()->show();
  $this->reset();
        }
    } catch (\Exception $e) {
           LivewireAlert::title('No se pudo actualizar')->error()->show();
  $this->reset();
    }
}



public function keepItem()
{
   $this->reset();
    // Keep logic
}

public function deleteItem()
{
    try {
        $response = Http::delete("http://localhost:3000/api/clientes/{$this->idcliente}");

        if ($response->successful()) {
            session()->flash('success', "Cliente Borrado!!");
           LivewireAlert::title('Cambios guardados')
        ->success()
        ->show();
        } else {
            session()->flash('error', "Algo ocurrió en el proceso!!");
             LivewireAlert::title('No se pudo borrar cliente')->error()->show();
        }
    } catch (\Exception $e) {
        session()->flash('error', "Algo ocurrió en el proceso!!");
      LivewireAlert::title('No se pudo borrar cliente')->error()->show();
    }
}


public function eliminar($id){
    $this->idcliente=$id;
    LivewireAlert::title('Borrar Cliente')
    ->text('Esta seguro de borrar cliente')
    ->asConfirm()
    ->onConfirm('deleteItem')
    ->onDeny('keepItem')
    ->show();
}
}
