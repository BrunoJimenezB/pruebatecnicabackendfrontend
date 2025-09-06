<?php

namespace App\Livewire\Zonas;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class Listadozonas extends Component
{
    public $search;
    public $perPage = 3;
    public $page = 1;
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
        $url = 'http://localhost:3000/api/zonas-mayor-ventas';

        // Llamada al API
         $response = Http::get($url, ['search' => $this->search]);

                $data = $response->json();

        // Convertir array en colección
        $filtered = collect($data)->filter(function ($item) {
            return stripos($item['nombre_zona'], $this->search) !== false;
        })->values();

        // Paginación manual con Collection
        $offset = ($this->page - 1) * $this->perPage;
        $items = $filtered->slice($offset, $this->perPage);

        $zona = new LengthAwarePaginator(
            $items,
            $filtered->count(),
            $this->perPage,
            $this->page,
            ['path' => url()->current()]
        );
        return view('livewire.zonas.listadozonas', compact('zona'));
    }
    
}
