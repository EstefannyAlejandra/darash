<x-app-layout>
  
                    @if(session()->has('mensaje'))
                        <div class="uppercase border border-green-600 gb-green-100 text-green-600 font-bold p-2 my-3">
                            {{session('mensaje')}}
                        </div>
                    @endif
                        <livewire:mostrar-eventos/>
       
</x-app-layout>
