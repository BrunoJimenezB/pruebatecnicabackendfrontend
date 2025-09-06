<div>
   

    <div class="min-h-full bg-gray-100   py-5 px-20 rounded-lg shadow-md">
        <div class="px-14">
    <input wire:model.live="search"  class="border-2 rounded-lg px-2" type="text" placeholder="Buscador"> 
    
    </div>
    {{-- Poner if de no registros --}}
    @if ($producto->count())
    
    <div class="container max-w-screen-xl mx-auto">
    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr class="bg-white">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Producto
                </th>
              
              
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Precio
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($producto as $productos)
                
          
            <tr>
                <td class="px-1 py-3">{{$productos['Id_producto']}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{$productos['url_img']}}" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$productos['nombre']}} 
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$productos['descripcion']}}
                            </div>
                        </div>
                    </div>
                </td>
                              <td class="px-1 py-3 text-center">{{$productos['stock']}}</td>
                              <td class="px-1 py-3 text-center">${{$productos['precio']}}</td>
                              <td class="px-1 py-3 text-center">{{$productos['categoria']}}</td>


               
           
                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                    <a href="#" wire:click.prevent='abrirModal({{$productos['Id_producto']}})' class="text-indigo-600 hover:text-indigo-900">Editar</a>
                    <a href="#" wire:click.prevent='eliminar({{$productos['Id_producto']}})' class="ml-2 text-red-600 hover:text-red-900">Eliminar</a>
                </td>
            </tr>
    
                <!-- More rows... -->
            @endforeach
        </tbody>
    </table>
    <div >
          <div class="mt-4 flex justify-between">
       
    {{$producto->links()}}
    </div>
    </div>
    </div>
    </div>
    @else
    <div class="rounded-lg py-4 px-14">
        
    <strong class="text-red-800">No hay registros</strong>
    </div>
    @endif
      @if($modal)
    @include('modal.modalproducto')
    @endif
    
       </div>
    
            
    
    
    </div>
    

