<x-app-layout>
  
   <div class="flex flex-col justify-center text-center pt-12 items-center ">
           <h1 class="pb-2 text-xl font-bold w-[800px]"> {{ $evento->name }} </h1>
           <h2 class="pb-10">Papers</h2>
            @forelse ($evento->papers as $paper)

                <div class=" border border-gray-300 w-[1200px] text-left pt-1 py-3 px-2 rounded-xl hover:outline-2 hover:outline divide-y mb-4 ">
                  
                   <span 
                     @if($paper->estado === 'Aceptar' || $paper->estado === 'Probablemente Acepte')
                     class="text-blue-950  font-bold pb-1 inline-block my-1 bg-green-100 w-full rounded-lg px-3"
                     @elseif ($paper->estado === 'Rechazar')
                     class="text-blue-950 font-bold pb-1 inline-block my-1 bg-red-100 w-full rounded-lg px-3"
                     @else
                      class="text-blue-950 font-bold pb-1 inline-block my-1 bg-gray-100 w-full rounded-lg px-3"
                     @endif
                     >  {{$paper->titulo}} </span>

                   <div class="flex flex-wrap text-sm pt-2">
                      <span class="w-[20%]  px-3"><strong class="text-gray-500 font-semibold">Estado: </strong> 
                     
                        @if($paper->estado === '0')
                              Sin calificación final 
                         @elseif ($paper->estado === 'Aceptar')
                             Aceptado
                          @elseif ($paper->estado === 'Probablemente Acepte')
                              Aceptado con observaciones 
                          @elseif ($paper->estado === 'Rechazar')
                            Rechazado
                           @else 
                             Desconocido
                        @endif
                        </span>

                        <span class="w-[20%] px-3"><strong class="text-gray-500 font-semibold">Documento: </strong> 
                     
                           @if($paper->paper === 'sinpaper.pdf')
                                 Sin Cargar
                              @else 
                              Cargado
                           @endif
                           </span>

                       <span class="w-[20%] text-left"> {{$paper->created_at->diffForHumans()}} </span>
                       {{-- <span class="basis-1/3 text-center"> Pendiente {{$paper->estado}} </span> --}}
                  
                        <span class="w-[20%] text-center underline underline-offset-2 hover:text-blue-800">
                           <a href="{{ route('paper.resultado' , $paper)}}"><strong class="text-gray-500 font-semibold"> Ver evaluación: </strong>  
                              @if( $paper->evaluador->count() === 1 )
                              {{$paper->evaluador->count()}} calificación
                             @else 
                               {{$paper->evaluador->count()}} calificaciones
                             @endif
                              </a>
                        </span>

                       <a href="{{ route('paper.show' , $paper)}}" class="w-[20%] inline-block text-right underline underline-offset-2 hover:text-blue-800 pr-3">Asignar evaluador</a>
                    </div>
                 </div>
                 @empty
                 <p>No hay papers para mostrar</p>
              @endforelse
               <div class="flex justify-center">
                     {{-- {{ $paper->links() }} --}}
                </div>
       </div>
</x-app-layout>
