<div class="p-6 bg-white rounded shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Crear Producto</h2>

    @if(session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session()->has('error'))
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" wire:model="nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea wire:model="descripcion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('descripcion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" step="0.01" wire:model="precio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('precio') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" wire:model="stock" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('stock') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Categoría</label>
            <input type="text" wire:model="categoria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('categoria') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
    <label class="block text-sm font-medium text-gray-700">URL de Imagen (opcional)</label>
    <input type="url" wire:model.live="url_img" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('url_img') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

    @if($url_img)
        <div class="mt-2">
            <img src="{{ $url_img }}" alt="Vista previa" class="h-32 w-32 object-cover rounded border">
        </div>
    @endif
</div>


        <button wire:click="guardarProducto" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar Producto 
        </button>
    </div>
</div>
