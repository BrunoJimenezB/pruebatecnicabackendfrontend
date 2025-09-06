<div class="p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Crear Venta</h2>

    <div class="mb-4">
       <div class="mb-4 flex space-x-4">
    <!-- Cliente -->
    <div class="flex-1">
        <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
        <select wire:model="Id_cliente" id="cliente" name="cliente_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Selecciona un cliente --</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->Id_Cliente }}">{{ $cliente->Nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Vendedor -->
    <div class="flex-1">
        <label for="vendedor" class="block text-sm font-medium text-gray-700">Vendedor</label>
        <select wire:model="Id_vendedor" id="vendedor" name="vendedor_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Selecciona un vendedor --</option>
            @foreach ($vendedores as $vendedor)
                <option value="{{ $vendedor->Id_vendedor }}">{{ $vendedor->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Zona -->
    <div class="flex-1">
        <label for="zona" class="block text-sm font-medium text-gray-700">Zona</label>
        <select wire:model="Id_zona" id="zona" name="zona_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">-- Selecciona una zona --</option>
            @foreach ($zonas as $zona)
                <option value="{{ $zona->Id_zona }}">{{ $zona->nombre_zona }}</option>
            @endforeach
        </select>
    </div>
</div>

    </div>

  <h3 class="text-xl font-semibold">Productos</h3>
<div class="grid grid-cols-1 gap-4 mb-6 overflow-y-auto"
     style="max-height: calc(3 * 120px + 2 * 16px);">
    @foreach($productos as $producto)
        <div class="border p-3 rounded flex items-center">
            <img src="{{ $producto['url_img'] }}" alt="{{ $producto['nombre'] }}" class="h-10 w-10 rounded mr-3">
            <div class="flex-1">
                <p><strong>{{ $producto['nombre'] }}</strong></p>
                <p>${{ number_format($producto['precio'], 2) }}</p>
            </div>
            <button wire:click="agregarProducto({{ $producto['Id_producto'] }})" 
                    class="bg-blue-500 text-white px-3 py-1 rounded ml-2">
                Agregar
            </button>
        </div>
    @endforeach
</div>


    <h3 class="text-xl font-semibold">Carrito</h3>
    @if(!empty($carrito))
        <table class="w-full border mb-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">Producto</th>
                    <th class="p-2">Cantidad</th>
                    <th class="p-2">Precio Unit.</th>
                    <th class="p-2">Subtotal</th>
                    <th class="p-2">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $index => $item)
                    <tr>
                        <td class="p-2">{{ $item['nombre'] }}</td>
                        <td class="p-2">
                            <input type="number" min="1" wire:change="actualizarCantidad({{ $index }}, $event.target.value)" value="{{ $item['cantidad'] }}" class="w-16 border rounded p-1">
                        </td>
                        <td class="p-2">${{ number_format($item['precio_unitario'], 2) }}</td>
                        <td class="p-2">${{ number_format($item['subtotal'], 2) }}</td>
                        <td class="p-2">
                            <button wire:click="quitarProducto({{ $index }})" class="bg-red-500 text-white px-2 py-1 rounded">X</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-right font-bold mb-4">
            Total: ${{ number_format($monto_total, 2) }}
        </div>

        <button wire:click="guardarVenta" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Venta</button>
    @else
        <p class="text-gray-600">No hay productos en el carrito.</p>
    @endif

    @if(session()->has('success'))
        <p class="text-green-600 mt-4">{{ session('success') }}</p>
    @endif
    @if(session()->has('error'))
        <p class="text-red-600 mt-4">{{ session('error') }}</p>
    @endif
</div>
