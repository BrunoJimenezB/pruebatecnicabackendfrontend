<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
class Crearcliente extends Component
{
     public $Nombre;
    public $Telefono;
    public $Direccion;
    public $Email;

    protected $rules = [
        'Nombre' => 'required|string|max:255',
        'Telefono' => 'required|string|max:20',
        'Direccion' => 'required|string|max:255',
        'Email' => 'required|email',
    ];
    public function guardarCliente()
    {
        $this->validate();

        $response = Http::post('http://localhost:3000/api/clientes', [
            'Nombre' => $this->Nombre,
            'Telefono' => $this->Telefono,
            'Direccion' => $this->Direccion,
            'Email' => $this->Email,
        ]);

        if($response->successful()){
            $this->reset(); // limpiar formulario
            session()->flash('success', 'Cliente creado correctamente ');
        } else {
            session()->flash('error', 'Error al crear cliente: ' . $response->body());
        }
    }
    public function render()
    {
        return view('livewire.clientes.crearcliente');
    }
}
