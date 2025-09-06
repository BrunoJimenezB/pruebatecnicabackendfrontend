<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
       
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all">
          <div class="bg-gray-100 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
            
                <div class="mt-2">

                 <div class="min-h-full  p-6 bg-gray-100 flex justify-center ">

                   
                 {{-- tabla --}}
<div>
   

    <div class="min-h-full bg-gray-100   py-5 px-20 rounded-lg shadow-md">
        <div class="px-14">
    
    </div>
    {{-- Poner if de no registros --}}
    @if ($detalleventa->count())
    
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
                    Cantidad
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Precio Unitario
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Subtotal
                </th>
              
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($detalleventa as $detalle)
                
          
            <tr>
                <td class="px-1 py-3">{{$detalle['Id_producto']}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{$detalle['url_img']}}" alt="">
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$detalle['nombre_producto']}} 
                            </div>
                           
                        </div>
                    </div>
                </td>
                              <td class="px-1 py-3 text-center">{{$detalle['cantidad']}}</td>
                              <td class="px-1 py-3 text-center">${{$detalle['precio_unitario']}}</td>
                              <td class="px-1 py-3 text-center">{{$detalle['subtotal']}}</td>


               
           
               
            </tr>
    
                <!-- More rows... -->
            @endforeach
        </tbody>
    </table>
   <div class="flex justify-end mt-2">
    <div class="w-1/5 text-right font-bold">
        TOTAL: {{ $monto_total }}
    </div>
</div>
   <div class="flex justify-end mt-2">
    <div class="w-1/5 text-right font-bold">
         <button wire:click.prevent='regresar()' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">Volver</button>
    </div>
</div>
    
    <div >
          <div class="mt-4 flex justify-between">
       
   
    </div>
    </div>
    </div>
    </div>
    @else
    <div class="rounded-lg py-4 px-14">
        
    <strong class="text-red-800">No hay registros</strong>
    </div>
    @endif
     
    
       </div>
    
            
    
    
    </div>
    


                 
                 {{-- tabla --}}
                      
                      {{-- @include('sweetalert::alert') --}}
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          </div>
        </div>
      </div>
    </div>
  </div>