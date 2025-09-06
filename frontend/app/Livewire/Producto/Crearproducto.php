<?php

namespace App\Livewire\Producto;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Crearproducto extends Component
{
     public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $categoria;
    public $url_img;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string|max:500',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'categoria' => 'required|string|max:100',
        'url_img' => 'required|url',
    ];

    public function guardarProducto()
    {
        $this->validate();

        $response = Http::post('http://localhost:3000/api/productos', [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
            'categoria' => $this->categoria,
            'url_img' => $this->url_img,
        ]);

        if ($response->successful()) {
            $this->reset(); // Limpiar formulario
            session()->flash('success', 'Producto creado correctamente ');
        } else {
            session()->flash('error', 'Error al crear producto: ' . $response->body());
        }
    }
    public function render()
    {
        return view('livewire.producto.crearproducto');
    }
}
