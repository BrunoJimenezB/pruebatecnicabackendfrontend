<div>
   

    <div class="min-h-full bg-gray-100   py-5 px-20 rounded-lg shadow-md">
        <div class="px-14">
    <input wire:model.live="search"  class="border-2 rounded-lg px-2" type="text" placeholder="Buscador"> 
    
    </div>
    {{-- Poner if de no registros --}}
    @if ($venta->count())
    
    <div class="container max-w-screen-xl mx-auto">
    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr class="bg-white">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID_VENTA
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cliente
                </th>
                   <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Vendedor
                </th>
              
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Zona
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($venta as $ventas)
                
          
            <tr>
                <td class="px-1 py-3">{{$ventas['Id_venta']}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" style="margin-left: 0.3cm; margin-right: 0.3cm">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
</svg>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$ventas['nombre_cliente']}} 
                            </div>
                           
                        </div>
                    </div>
                </td>
               <td class="px-1 py-3">{{$ventas['nombre_vendedor']}}</td>
              <td class="px-1 py-3">{{$ventas['nombre_zona']}}</td>
              <td class="px-1 py-3">{{$ventas['fecha']}}</td>
               <td class="px-1 py-3">${{$ventas['monto_total']}}</td>
           
                <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                    <a href="#" wire:click.prevent='abrirModal({{$ventas['Id_venta']}})' class="text-indigo-600 hover:text-indigo-900">Ver detalle</a>
                    
                </td>
            </tr>
    
                <!-- More rows... -->
            @endforeach
        </tbody>
    </table>
    <div >
          <div class="mt-4 flex justify-between">
       
    {{$venta->links()}}
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
    @include('modal.modaldetalleventa')
    @endif
    
       </div>
    
            
    
    
    </div>