<div>
    @if($modal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" wire:click.self="cerrarModal">
        <div class="bg-white rounded-lg w-1/2 p-6" wire:click.stop>
            <h2 class="text-2xl font-bold mb-4">Editar Producto</h2>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" wire:model="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('nombre') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea wire:model="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" step="0.01" wire:model="precio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" wire:model="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Categoría</label>
                <input type="text" wire:model="categoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">URL de Imagen</label>
                <input type="url" wire:model="url_img" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @if($url_img)
                    <img src="{{ $url_img }}" alt="Imagen" class="mt-2 h-32 w-32 object-cover rounded border">
                @endif
            </div>

            <div class="flex justify-end space-x-2">
                <button wire:click="cerrarModal" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button wire:click.prevent="actualizarProducto({{$Id_producto}})" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
            </div>
        </div>
    </div>
    @endif
</div>
