<?php

namespace App\Livewire\Ventas;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Zona;
class CreateVenta extends Component
{
    public $productos = [];
    public $carrito = [];
    public $Id_cliente;
    public $Id_vendedor;
    public $Id_zona;
    public $fecha;
    public $monto_total = 0;

    public function mount()
    {
        // Consumir productos desde tu API
        $response = Http::get('http://localhost:3000/api/productos');
        $this->productos = $response->json();
        $this->fecha = now()->toDateString();
    }

    public function agregarProducto($idProducto)
    {
        $producto = collect($this->productos)->firstWhere('Id_producto', $idProducto);

        if ($producto) {
            $this->carrito[] = [
                "Id_producto" => $producto['Id_producto'],
                "nombre" => $producto['nombre'],
                "cantidad" => 1,
                "precio_unitario" => $producto['precio'],
                "subtotal" => $producto['precio']
            ];
            $this->calcularTotal();
        }
    }

    public function actualizarCantidad($index, $cantidad)
    {
        if (isset($this->carrito[$index])) {
            $this->carrito[$index]['cantidad'] = $cantidad;
            $this->carrito[$index]['subtotal'] = $cantidad * $this->carrito[$index]['precio_unitario'];
            $this->calcularTotal();
        }
    }

    public function quitarProducto($index)
    {
        unset($this->carrito[$index]);
        $this->carrito = array_values($this->carrito);
        $this->calcularTotal();
    }

    public function calcularTotal()
    {
        $this->monto_total = collect($this->carrito)->sum('subtotal');
    }

    public function guardarVenta()
    {
        $payload = [
            "Id_cliente" => $this->Id_cliente,
            "Id_vendedor" => $this->Id_vendedor,
            "Id_zona" => $this->Id_zona,
            "fecha" => $this->fecha,
            "monto_total" => $this->monto_total,
            "detalles" => collect($this->carrito)->map(function ($item) {
                return [
                    "Id_producto" => $item['Id_producto'],
                    "cantidad" => $item['cantidad'],
                    "precio_unitario" => $item['precio_unitario'],
                      "subtotal" => $item['precio_unitario']*$item['cantidad']
                ];
            })->toArray()
        ];

        $response = Http::post('http://localhost:3000/api/ventas', $payload);

        if ($response->successful()) {
            session()->flash('success', 'Venta registrada con éxito');
            $this->reset(['carrito', 'monto_total']);
        } else {
            session()->flash('error', 'Error al registrar venta: ' . $response->body());
        }
    }
    public function render()
    {
          $clientes = Cliente::all();
    $vendedores = Vendedor::all();
    $zonas = Zona::all();
        return view('livewire.ventas.create-venta', compact('clientes', 'vendedores', 'zonas'));
    }
}
