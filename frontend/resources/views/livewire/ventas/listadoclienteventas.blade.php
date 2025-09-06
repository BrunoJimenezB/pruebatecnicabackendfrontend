<div>
   

    <div class="min-h-full bg-gray-100   py-5 px-20 rounded-lg shadow-md">
        <div class="px-14">
   
     
    </div>
    
    {{-- Poner if de no registros --}}

   
    @if ($clienteventas->count())
    
    <div class="container max-w-screen-xl mx-auto">
    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
    <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
        <thead class="bg-gray-50">
            <tr class="bg-white">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID_Cliente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Cliente
                </th>
               <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ventas 2020
                </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ventas 2021
                </th>        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ventas 2022
                </th>        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ventas 2023
                </th>        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ventas 2024
                </th>        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Ventas 2025
                </th>
             
               
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($clienteventas as $cliente)
                
          
            <tr>
                <td class="px-1 py-3">{{$cliente['Id_Cliente']}}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                          
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{$cliente['nombre_cliente']}} 
                            </div>
                        
                        </div>
                    </div>
                </td>
                             

               <td class="px-1 py-3 text-right">{{$cliente['ventas_2020']}}$</td>
                <td class="px-1 py-3 text-right">{{$cliente['ventas_2021']}}$</td>
                <td class="px-1 py-3 text-right">{{$cliente['ventas_2022']}}$</td>
                <td class="px-1 py-3 text-right">{{$cliente['ventas_2023']}}$</td>
                <td class="px-1 py-3 text-right">{{$cliente['ventas_2024']}}$</td>
                <td class="px-1 py-3 text-right">{{$cliente['ventas_2025']}}$</td>
           
             
            </tr>
    
                <!-- More rows... -->
            @endforeach
        </tbody>
    </table>
    <div >
          <div class="mt-4 flex justify-between">
       
    {{$clienteventas->links()}}
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