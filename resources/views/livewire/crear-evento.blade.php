<div class="relative flex h-[600px] flex-col justify-center overflow-hidden bg-white items-center w-screen">
    <div class="w-[95%] md:w-[900px]  m-auto sm:pt-0  ">
        <div class="flex relative flex-row h-[500px]   shadow-[0px_10px_50px_-25px_rgba(0,0,0,1)] bg-gradient-to-b from-blue-900 to-black rounded-xl md:rounded-[30px] m-auto items-center">

            <div class="relative h-full basis-[60%] rounded-l-3xl md:p-12 p-16 pr-0"> 
            
            <h2 class="text-gray-200 text-4xl  mt-2 font-bold">CREAR<br>EVENTO</h2>
             <form class="md:mt-12" wire:submit.prevent='crearEvento'>
                 @csrf
                    <!-- Name -->
        <!-- Fecha fin evento -->
                
                        <x-input-label for="fecha_fin" :value="__('Fecha Final')" />
                        <x-text-input 
                        id="fecha_fin" 
                        class="block mt-1 w-full" 
                        type="date"
                        wire:model="fecha_fin"
                        :value="old('fecha_fin')" required autocomplete="fecha_fin" />
                        <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />

                        <x-input-label for="Nombre Evento" :value="__('Nombre Evento')" />
                        <x-text-input 
                        id="name"
                        class="block mt-1 w-full" 
                        type="text"
                        wire:model="name" 
                        :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        
               
                  <section class="absolute bottom-0 mb-9 ">
                        <button class="text-white block mb-4 text-xl cursor-pointer">
                            Crear
                        </button>
                    </section>
                   </form>
                
                </div>
                <div class="relative h-full  basis-[40%] flex justify-center items-center">
            <div class="flex items-end invisible md:visible md:w-[96%] bg-gray-200 h-[96.9%] rounded-[23px] bg-gradient-to-t from-black to-50%">
                <div class="m-7 mb-8">
                <h2 class="text-white text-3xl mb-4">Convoquemos conocimiento!</h2>
                <h3 class="text-white text-sm mb-4  ">Puedes editar el nombre y la fecha final del evento despues de haberlo creado de ser necesario.</h3>
                </div>
                </div>
            </div>
            </div>
            </div>
       </div>
     </div>

     @push('scripts')
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script>
                 Livewire.on('evento', () => {
                 Swal.fire({
                 position: 'top-end',
                 icon: 'success',
                 title: 'El evento fue creado exitosamente',
                 showConfirmButton: false,
                 timer: 2500
                 })
                 setTimeout('history.back()',2500);
              })
     </script>
   

     @endpush