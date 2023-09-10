<div class="relative flex min-h-screen flex-col justify-center overflow-hidden items-center">

     <div class="w-[80%] min-w-[900px]  rounded-3xl overflow-hidden bg-white  border-2 border-gray-700">
            
            <form wire:submit.prevent='subirPapers'>
                @csrf
                <div class="flex relative flex-row h-[550px] m-auto items-center">
                    <div class="relative h-full basis-4/6 p-10 pt-6">
                    <!-- titulo -->
                    <h1  class="text-gray-700 text-5xl mb-4  font-bold">PAPER</h1>
                        <x-input-label  for="titulo" :value="__('Titulo')" />
                        <textarea 
                        class="border border-none  w-[100%]  bg-gray-300 text-sm p-3  pt-2 focus:outline-none resize-none mb-1 rounded-lg "
                        wire:model.debounce.250ms="titulo"  name="titulo" id="titulo"></textarea>
                        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />

            <!-- abstrac -->

                        <x-input-label for="resumen" :value="__('Resumen')" />
                        <textarea  wire:model.debounce.250ms="resumen"  name="resumen" id="resumen"  class="border border-none  h-32 w-[100%]  bg-gray-300 text-sm p-3  pt-2 focus:outline-none resize-none mb-3 rounded-lg"  ></textarea>
                        <x-input-error :messages="$errors->get('resumen')" class="mt-2" />

                    <!-- palabras_claves -->

                        <input
                        class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-300 file:text-gray-600 hover:file:bg-black hover:file:text-white mb-2"
                        id="paper"
                        type="file" 
                        accept="application/pdf"
                        wire:model="paper" 
                        required/>
                        <input-error :messages="$errors->get('paper')" class="mt-2" />

                        <x-input-label for="topicos " :value="__('Topicos')" /> 
                        <x-text-input 
                        class="border border-none  h-8 md:w-[100%] w-[380px]  bg-gray-300 text-xl pl-5 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400 rounded-lg"
                        id="topicos"
                        type="text"
                        placeholder="Por favor separarlos por comas"
                        wire:model="topicos" 
                        :value="old('topicos')" required autofocus />
                        <x-input-error :messages="$errors->get('topicos')" class="mt-2" />

                            <section class="absolute bottom-0 mb-6 ">
                                <button class="hover:text-blue-400 text-blue-950 font-bold block mb-2 text-xl cursor-pointer">CREAR</button>
                            </section>

                    </div>

                    <div class="relative h-full  basis-2/6 flex justify-center items-center ">
                        <div class="flex w-full bg-[rgb(8,11,54)] h-full  divide-y ">
                          <div class=" h-full p-2 w-full overflow-y-auto divide-y divide-gray-500">
                       
                    @foreach ($userPapers as $index => $userPaper)
                    <div class=" w-auto p-4 ">
                        <x-input-label for="email " :value="__('Correo Autor')" />
                        <x-text-input 
                        class="border border-none h-8 w-[100%]  bg-gray-300 text-sm pl-3 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400  mb-2 rounded-lg"
                        id="email"
                        name="userPapers[{{$index}}][email]"
                        type="text"
                        wire:model="userPapers.{{$index}}.email" 
                        :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />


                        <x-input-label for="name" :value="__('Nombre Autor')" />
                        <x-text-input 
                        class="border border-none h-8 w-[100%]  bg-gray-300 text-sm pl-3 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400  mb-2 rounded-lg"
                        id="name"
                        name="userPapers[{{$index}}][name]"
                        type="text"
                        wire:model="userPapers.{{$index}}.name" 
                        :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        <x-input-label for="surname" :value="__('Apellido Autor')" />
                        <x-text-input 
                        class="border border-none h-8 w-[100%]  bg-gray-300 text-sm pl-3 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400  mb-2 rounded-lg"
                        id="surname"
                        name="userPapers[{{$index}}][surname]"
                        type="text"
                        wire:model="userPapers.{{$index}}.surname" 
                        :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                     </div>
                {{-- <div>
                        <a href="#" class="bg-white" wire:click.prevent="removeUser({{$index}})">Borrar Autor</a>
                    </div> --}}
                    @endforeach
                      
                            
                        <button  class="text-gray-200 text-xs block p-5 underline underline-offset-2" wire:click.prevent="addUsers">+ Agregar otro autor</button>

                </form>
            </div>
           </div>
        </div>
       </div>
    </div>
                @push('scripts')
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                            Livewire.on('paper', () => {
                            Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'El paper fue creado exitosamente',
                            showConfirmButton: false,
                            timer: 1500
                            })
                            setTimeout('history.back()', 1500);
                        })
                </script>
                @endpush
