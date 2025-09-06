<div class="p-6 bg-white rounded shadow-md max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Crear Cliente</h2>

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
            <input type="text" wire:model="Nombre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('Nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" wire:model="Telefono" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('Telefono') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" wire:model="Direccion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('Direccion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model="Email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('Email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button wire:click="guardarCliente" class="bg-blue-500 text-white px-4 py-2 rounded">
            Guardar Cliente 
        </button>
    </div>
</div>
