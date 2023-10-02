        
              <div class="relative flex flex-col min-h-[80vh] bg-white   text-center pt-5 items-end px-20 pb-1 ">

                <h2 class=" text-2xl flex text-center w-full justify-center bg-blue-950 text-white py-2"> {{ $paper->titulo }}</h2>
            
                @if(session()->has('mensaje'))
                <div class="uppercase border border-gree-600 bg-green-100 text-green-600 font-bold p-2 my-5">
                    {{ session('mensaje')}}
                </div>
                @endif  

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

                  
                  <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                    <div class="  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto">Documento</div>
                    <div class="flex w-[90%] bg-gray-300 text-start py-2 px-4  items-center rounded-lg min:h-8 h-auto">
                      @if($paper->paper == 'sinpaper.pdf')
                      Sin cargue de documento
                      @else
                    <a target="_blank" href="{{ asset('storage/documentos/'. $paper->paper);
                    }}">Ver documento</a>
                    @endif 
                    </div>
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
                
                    <!-- Agregar  revisor -->

                    <div class="bg-blue-950 h-[2px] w-[90%] mb-3"></div>
    
                    <div class="w-full min:h-9 h-auto flex items-start mb-3 text-sm">
                      <div class="items-center  text-blue-950 font-bold w-[10%] text-right pr-4 my-auto leading-tight">Agregar revisor</div>
                
                      <div class="flex   w-[90%]  text-start    rounded-lg min:h-8 h-auto">
            
                        <form wire:submit.prevent='enviarRevisor({{$paper->id}})' class="flex items-end  w-full ">
                            @csrf
                    
                            <div class="basis-1/3 ">
                                <label class="text-blue-950 block">Nombre:</label>
                                <input 
                                id="name"
                                class="bg-gray-300 w-[78%] mt-1 h-8 px-3 rounded-lg" 
                                type="text"
                                wire:model="name"  
                                :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="basis-1/3 ">
                                <label class="text-blue-950 block">Apellido:</label>
                                <input 
                                id="surname"
                                class="bg-gray-300 w-[78%] mt-1 h-8 px-3 rounded-lg" 
                                type="text"
                                wire:model="surname"  
                                :value="old('surname')" required autofocus />
                                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                            </div>

                            <div class="basis-1/3 ">
                                <label class="text-blue-950 block">Email:</label>
                                <input 
                                id="email"
                                class="bg-gray-300 w-[78%] mt-1 h-8 px-3 rounded-lg" 
                                type="email"
                                wire:model="email" 
                                :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                        
                                <button class="text-white block  text-lg cursor-pointer bottom-0 px-4 mr-6 bg-blue-950 rounded-lg h-8">   Enviar </button>
                            </form>
                                  </div>
                                </div>
                                @push('scripts')
                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                  <script>
                                            Livewire.on('revisor', () => {
                                            Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'Se envió notificación al revisor exitosamente',
                                            showConfirmButton: false,
                                            timer: 2500
                                            })
                                            setTimeout('history.back()',2500);
                                         })
                                </script>
                             @endpush

