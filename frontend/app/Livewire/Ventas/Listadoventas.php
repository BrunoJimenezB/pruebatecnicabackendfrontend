<?php

namespace App\Livewire\Ventas;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
class Listadoventas extends Component
{
    public $search;
    public $perPage = 6;
    public $page = 1;
    public $fechaInicio, $fechaFin;
    public $modal=false;
    public $detalleventa;
    public $monto_total= 0;
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
    public function render()
    {
          $url = 'http://localhost:3000/api/ventas';

        // Llamada al API
         $response = Http::get($url, ['search' => $this->search]);

                $data = $response->json();

        // Convertir array en colección
        $filtered = collect($data)->filter(function ($item) {
            return stripos($item['nombre_cliente'], $this->search) !== false;
        })->values();

        // Paginación manual con Collection
        $offset = ($this->page - 1) * $this->perPage;
        $items = $filtered->slice($offset, $this->perPage);

        $venta = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            $this->perPage,
            $this->page,
            ['path' => url()->current()]
        );
        return view('livewire.ventas.listadoventas', compact('venta'));
    }

     public function abrirModal($id)
{
    

    // Llamar a tu API (usando Http client de Laravel)
    $response = Http::get("http://localhost:3000/api/detalle-ventas/{$id}"); // Cambia la URL

    if ($response->successful()) {
        $this->modal = true;
        $data = $response->json();
        $collection = collect($data); 
        $this->detalleventa= $collection;
        $this->monto_total = $this->detalleventa->sum('subtotal');
    }else{
        dd('No encontrado');
  session()->flash('error', 'No encontrado');
    }
}
public function regresar(){
    $this->reset();
}
}