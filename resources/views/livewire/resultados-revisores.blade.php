        
              <div class="relative flex flex-col min-h-[80vh] bg-white   text-center pt-5 items-end px-20 pb-1 ">
          
                <h2 class=" text-2xl flex text-center w-full justify-center bg-blue-950 text-white py-2"> {{ $paper->titulo }}</h2>

                <div class=" flex items-center justify-between my-2 w-[90%] mt-5 relative right-0 ">
                    <span class=" block pl-1 text-blue-950 font-semibold">PAPER {{$paper->count()}} </span>
                    <span class=" text-gray-500 text-sm block">Fecha de creación:<span class=" mx-1 text-blue-950 font-bold">  {{ $paper->created_at->format('d/m/Y') }}</span></span>
                  </div>

                  <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                    <div class="  text-blue-950 font-bold  w-[10%] text-right pr-4 my-auto">Titulo</div>
                    <div class="flex   w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto"> {{ $paper->titulo }}</div>
                  </div>

                  <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                    <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Resumen</div>
                    <div class="flex   w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">{{ $paper->resumen }}</div>
                  </div>

                  <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                    <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Topicos</div>
                    <div class="flex   w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">{{ $paper->topicos }}</div>
                  </div>

                  @foreach ($paper->autor as $autor )
                 
                  <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                    <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Autor </div>
                    <div class="flex   w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">
                      <div class="basis-1/3 ">
                      <span class="text-blue-950 font-semibold">Nombre:</span><span class="pl-2">{{ $autor->name }}</span>
                      </div>
                      <div class="basis-1/3 ">
                      <span class="text-blue-950 font-semibold">Apellido:</span><span class="pl-2">{{ $autor->surname }}</span>
                      </div>
                      <div class="basis-1/3 ">
                      <span class="text-blue-950 font-semibold">Email:</span><span class="pl-2">{{ $autor->email }}</span>
                      </div>
                    </div>
                  </div>
                  @endforeach
              
                    <div class=" bg-blue-950 h-[2px] w-[90%] mb-3"></div>
                    <div class=" px-20 mb-3 w-full text-left"><span class=" block pl-1 text-blue-950 font-semibold">Resultados {{$paper->evaluador->count()}} </span></div>
                    
                    @foreach ($paper->evaluador as $evalua )
                    <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                      <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Evaluador </div>
                      <div class="flex   w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">
                        <div class="w-[20%]">
                        <span class="text-blue-950 font-semibold">Nombre:</span><span class="pl-2">{{ $evalua->name }}</span>
                        </div>
                        <div class="w-[20%] ">
                        <span class="text-blue-950 font-semibold">Calificación:</span><span class="pl-2">{{ $evalua->calificacion }}</span>
                        </div>
                        <div class="w-[60%] ">
                        <span class="text-blue-950 font-semibold">Observacion:</span><span class="pl-2">{{ $evalua->observacion }}</span>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    
                    <div class="bg-blue-950 h-[2px] w-[90%] mb-3"></div>
                       <!-- Agregar  Calificacion -->
                       <div class="w-[90%] mb-3 mt-3  text-red-800 font-bold text-lg">Agregar Calificacion Final</div>
                    <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm ">


                      <div class="items-center  text-blue-950 font-bold w-[10%] text-right  my-auto "></div>
                
                      <div class="flex  w-[90%]  text-start rounded-lg min:h-8 h-auto ">
                        <form wire:submit.prevent='enviarCalificacionFinal({{$paper->id}})' class="flex items-end justify-center w-full mb-48">
                            @csrf
                            <select wire:model="calificacion" id="calificacion" name="calificacion" required  class="bg-gray-300 w-[40%]  h-10 px-3 rounded-lg text-center">
                                   <option> --- Seleccione --- </option>
                                    <option value="Aceptar"> Aceptar </option>
                                    <option value="Probablemente Acepte "> Aceptar con observaciones</option>
                                    <option value="Rechazar"> Rechazar </option>
                            </select>
                            <x-input-error :messages="$errors->get('calificacion')" class="mt-2" />
                        
                                <button class="text-white block  text-lg cursor-pointer bottom-0 px-4 mr-8 bg-blue-950 rounded-lg h-10 mx-10">   Enviar </button>
                       </form>
                       @if(session()->has('mensaje'))
                       <div class="uppercase border border-gree-600 bg-green-100 text-green-600 font-bold p-2 my-5">
                           {{ session('mensaje')}}
                       </div>
                       @endif 
                       <a href="javascript:history.back()"> Volver Atrás</a>
                   </div>
                 
              </div>
            
        </div>