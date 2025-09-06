<div>
   

    <div class="min-h-full bg-gray-100   py-5 px-20 rounded-lg shadow-md">
        <div class="px-14">
    <label >Fecha de Inicio</label>
    <input wire:model.live="fechaInicio"type=date class="border-2 rounded-lg px-2">
    <label >Fecha Final</label>
     <input wire:model.live="fechaFin" type=date class="border-2 rounded-lg px-2">
     
    </div>
    
    {{-- Poner if de no registros --}}

    @if(empty($fechaInicio) || empty($fechaFin ))
    <div class="rounded-lg py-4 px-14">
        
    <strong class="text-red-800">Ingrese fecha de inicio y fecha final</strong>
    </div>
    @else
    @if ($vendedor->count())
    
    <div class="container max-w-screen-xl mx-auto">
    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr class="bg-white">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID_VENDEDOR
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Vendedor
                </th>
              
                
             
               
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($vendedor as $vendedores)
                
          
            <tr>
                <td class="px-1 py-3">{{$vendedores['Id_vendedor']}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/3263396/person-pin-icon-md.png" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$vendedores['nombre_vendedor']}} 
                            </div>
                        
                        </div>
                    </div>
                </td>
              
           
           
             
            </tr>
    
                <!-- More rows... -->
            @endforeach
        </tbody>
    </table>
    <div >
          <div class="mt-4 flex justify-between">
       
    {{$vendedor->links()}}
    </div>
    </div>
    </div>
    </div>
    @else
    <div class="rounded-lg py-4 px-14">
        
    <strong class="text-red-800">No hay registros</strong>
    </div>
    @endif
    @endif
    
       </div>
    
            
    
    
    </div>