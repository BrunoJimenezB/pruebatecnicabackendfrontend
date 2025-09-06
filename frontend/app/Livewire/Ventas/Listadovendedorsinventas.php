<?php

namespace App\Livewire\Ventas;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;

class Listadovendedorsinventas extends Component
{
    public $search;
    public $perPage = 3;
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
    public function render()
    {
         $url = 'http://localhost:3000/api/vendedor-sin-ventas';

        // Llamada al API
         $response = Http::get($url, [
         
            'fechaInicio' => $this->fechaInicio,
            'fechaFin' => $this->fechaFin
           
           
        ]);
        
        
       

                $data = $response->json();

        // Convertir array en colección
        $filtered = collect($data)->filter(function ($item) {
            return stripos($item['nombre_vendedor'], $this->search) !== false;
        })->values();

        // Paginación manual con Collection
        $offset = ($this->page - 1) * $this->perPage;
        $items = $filtered->slice($offset, $this->perPage);

        $vendedor = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            $this->perPage,
            $this->page,
            ['path' => url()->current()]
        );
    
        return view('livewire.ventas.listadovendedorsinventas', compact('vendedor'));
    }
}
