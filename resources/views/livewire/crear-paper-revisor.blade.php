<div class=" relative w-full  flex flex-col min-w-[850px]">              
    <div class="relative flex flex-col min-h-[80vh] bg-white   text-center pt-5 items-end px-20 pb-1 ">
      
      <h2 class=" text-2xl flex text-center w-full justify-center bg-blue-950 text-white py-2"> </h2>

                @if(session()->has('mensaje'))
                <div class="uppercase border border-gree-600 bg-green-100 text-green-600 font-bold p-2 my-5">
                    {{ session('mensaje')}}
                </div>
                @endif  

                <div class=" flex items-center justify-between my-2 w-[90%] mt-5 relative right-0 ">
                  <span class=" block pl-1 text-blue-950 font-semibold">PAPER {{ $paper->id }}</span>
                  <span class=" text-gray-500 text-sm block">Fecha de creación:<span class=" mx-1 text-blue-950 font-bold">  {{ $paper->created_at->format('d/m/Y') }}</span></span>
                </div>

                <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                  <div class="  text-blue-950 font-bold  w-[10%] text-right pr-4 my-auto">Titulo</div>
                  <div class="flex w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">{{ $paper->titulo }}
                  </div>
                </div>

                <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                  <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Resumen</div>
                  <div class="flex w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto"> {{ $paper->resumen }} 
                  </div>
              </div>

              <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Topicos</div>
                <div class="flex w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">{{ $paper->topicos }}</div>
              </div>

              <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Paper</div>
                @if($paper->paper == 'sinpaper.pdf')
                Sin cargue de documento
                @else
              <a target="_blank" href="{{ asset('storage/documentos/'. $paper->paper);
              }}">Ver documento</a>
              @endif 

              </div>

              <div class="bg-blue-950 h-[2px] w-[90%] mb-3"></div>
    
              <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm pr-4 bg-red-100 py-4 rounded-lg">
                <div class="items-centertext-blue-950 font-bold w-[10%] text-right pr-4 my-auto leading-tight">Reviwer</div>
          
                <div class="flex w-[90%] text-start rounded-lg min:h-8 h-auto">

                  <form wire:submit.prevent='enviarCalificacion' class="flex flex-col w-full">
                    @csrf
              
                    <!-- revisor -->
                    <label class="block mb-1">Review:</label>
                        <select wire:model="calificacion"  id="calificacion" name="calificacion" required class="mb-4 rounded h-10 px-3 flex items-center">
                               <option> --- Seleccione --- </option>
                                <option value="Aceptar"> Aceptar </option>
                                <option value="Probablemente Acepte"> Aceptar con observaciones</option>
                                <option value="Rechazar"> Rechazar </option>
                        </select>
                        <x-input-error :messages="$errors->get('calificacion')" class="mt-2" />
                

              
                      <label class="text-blue-950 block mb-1" >Observaciones:</label>
                    <textarea  wire:model="observacion"  name="observacion" id="observacion"  required class="border border-none  h-32 w-[100%]  bg-white text-sm p-3  pt-2 focus:outline-none resize-none mb-3 rounded-lg "placeholder=""></textarea>
                    <x-input-error :messages="$errors->get('observacion')" class="mt-2" />
                 

                    <button class="text-white block  text-lg cursor-pointer bottom-0 px-4  bg-blue-950 rounded-lg h-8">
                       Guardar 
                    </button>

                  </form>
                </div>
              </div>

              @push('scripts')
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                          Livewire.on('reviwer', () => {
                          Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: 'Se guardó exitosamente',
                          showConfirmButton: false,
                          timer: 1500
                          })
                          setTimeout('history.back()',1500);
                       })
              </script>
            

              @endpush