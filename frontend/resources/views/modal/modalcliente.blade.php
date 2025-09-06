<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
  
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
       
        <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all">
          <div class="bg-gray-100 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              
              <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
            
                <div class="mt-2">

                 {{-- formulario --}}
                 <div class="min-h-full  p-6 bg-gray-100 flex justify-center ">

                    <form wire:submit.prevent.live="update({{$idcliente}})">
                        @if($errors-> any())
                        <div class="flex items-center px-4 py-2 mb-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                          <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                          </svg>
                          <span class="sr-only">Info</span>
                          <div>
                            <span class="font-medium">LLene todos los campos!</span> 
                            
                        </div>
                        </div>
                        
                        @endif
                        @csrf
                        <div class="container max-w-screen-xl mx-auto">
                          <div>
                                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                <div class="text-gray-600">
                                  <p class="font-medium text-lg">Cliente</p>
                                  <p>Ingrese los datos del Cliente para Actualizar </p>
                                </div>
                      {{-- Formulario --}}
                     
                                <div class="lg:col-span-2">
                                  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-4">
                                    <div class="md:col-span-4">
                                      <label for="full_name">Nombre</label>
                                   
                                      <input type="text"  wire:model.live="nombre" id="full_name" class=" @error('nombre') border-red-500 @enderror h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                      @error('nombre') <span class="error text-red-500 " >{{ $message }}</span> @enderror
                                    </div>
                      
                                    <div class="md:col-span-4">
                                      <label for="nombre">Direccion</label>
                                      <input type="text" wire:model.live="direccion" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 @error('direccion') border-red-500 @enderror" value="" />
                                      @error('direccion') <span class="error text-red-500">{{ $message }}</span> @enderror
                                    </div>
                    
                                
                  
                                
                                    <div class="md:col-span-2">
                                      <label class="leading-loose">Telefono</label>
                                      <div class="relative focus-within:text-gray-600 text-gray-400">
                                        <input type="text" wire:model.live="telefono" class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 @error('telefono') border-red-500 @enderror" placeholder="25/02/2020">
                                        
                                      </div>
                                    </div>
                                    <div class="md:col-span-2">
                                      <label class="leading-loose">Email </label>
                                      <div class="relative focus-within:text-gray-600 text-gray-400">
                                        <input type="text" wire:model.live="email" class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 @error('email') border-red-500 @enderror" placeholder="26/02/2020">
                                       
                                      </div>
                                    </div>
                                  
                            
                                 
                             
                      <div class="md:col-span-4 text-right">
                        <div class="inline-flex py-3 items-end">
                          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded">Actualizar</button>
                        </div>
                      </div>
                                
                            
                          
                      
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      
                          
                        </div>
                       
                        </form>
                      
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