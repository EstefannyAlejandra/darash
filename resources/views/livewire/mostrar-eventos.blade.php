
<div class=" relative h-screen overflow-visible space-y-4 pt-2 m-0 text-center">
    <h1 class="text-black font-bold text-4xl tracking-wider my-8">LISTA DE EVENTOS</h1>
    @forelse($eventos as $evento)
    <div class="group/item w-[80%] min-w-[360px]  border-gray-300 border-2 transition p-2 pb-1 rounded-lg m-auto  hover:outline-2  flex relative lace-items-center hover:outline text-left">
             <div class="w-[92%]">
                  <div class="block p-2 m-1 pl-4 text-white text-md font-bold rounded-md  bg-gradient-to-l from-blue-900 to-black">
                    <a  @if(auth()->user()->rol === '2' || auth()->user()->rol === '1' )
                       href="{{ route('eventos.show', $evento->id)}}
                       " @endif>
                      <p class="line-clamp-1">{{ $evento->name }}</p></a>
                  </div>
    <div class="flex justify-between items-end pl-4 pr-1  mt-3">
        <div class="text-sm ">
            <spam class="font-bold mr-1">Finaliza:</spam >{{ $evento->fecha_fin }}
        </div>
        <div  class="flex  text-sm">
             @if(auth()->user()->rol === '2' || auth()->user()->rol === '1' )
             <div class="">
              <button class="rounded-lg hover:bg-blue-900 mr-2  hover:text-white"><a href="{{ route('eventos.edit', $evento->id)}}" class="px-4">Editar</a></button>
            </div>
            <div class="">
              <button  wire:click="$emit('borrar', {{ $evento->id }})" class="hover:bg-red-600 px-2  rounded-lg hover:text-white align-text-bottom">Eliminar</button>
            </div>
            @endif
        </div>
    </div>
    </div>
    @if(auth()->user()->rol === '2' || auth()->user()->rol === '1' )
    <a href="{{ route('papers.index' , $evento)}}" class="relative min-w-[50px]  w-[8%]  m-1 mb-2 rounded-md bg-black text-white flex flex-col justify-between min-h-[60px] hover:bg-blue-900 "> 
       <span class="block text-center mt-1 text-sm mb-0">Ver</span>
       <span class="block text-center text-3xl mt-0 leading-7 font-medium">
          {{ $evento->papers->count() }}
        <span class="block mb-2 text-center text-xs  bottom-0">Papers</span>
        </a>
      @elseif (auth()->user()->rol === '3')
        @if(($fecha_actual =  date("Y-m-d")) <= ($evento->fecha_fin))
          <a href="{{ route('eventos.show', $evento->id)}}" class="relative min-w-[50px]  w-[8%]  m-1 rounded-md bg-black text-white flex flex-col justify-between min-h-[60px] hover:bg-blue-900 "> 
            <span class="block  text-center text-2xl top-0">
              Crear
            </span>
          <span class="block mb-2 text-center text-xs  bottom-0">Papers</span>
          </a>
          @endif
        @endif
    </div>
           @empty
                    <p>No hay evento para mostrar</p>
             @endforelse
             <div class="flex justify-center">
                {{ $eventos->links() }}
             </div>
           
 </div>    


@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 
    document.addEventListener("DOMContentLoaded", function(event) {
        window. livewire. on('borrar', eventoId => {
                            Swal.fire({
                title: 'Eliminar el evento',
                text: "Un evento no se puede volver a borrar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                // eilimar la vacante 
                    livewire.emit('eliminarEvento', eventoId)
                    Swal.fire(
                    'Se elimino el evento!',
                    'Eliminado correctamente',
                    'success'
                    )
                }
                })
            });
    });
</script>

@endpush