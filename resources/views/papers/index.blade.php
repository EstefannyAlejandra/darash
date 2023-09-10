<x-app-layout>
  
   <div class="flex flex-col justify-center text-center pt-12 items-center ">
           <h1 class="pb-2 text-xl font-bold w-[800px]"> {{ $evento->name }} </h1>
           <h2 class="pb-10">Papers</h2>
            @forelse ($evento->papers as $paper)

                <div class=" bg-gray-100 w-[1200px] text-left pt-1 py-3 px-5 rounded-xl hover:outline-2 hover:outline divide-y mb-4">
                  
                   <span class="text-blue-950 font-bold pb-1 inline-block my-1">  {{$paper->titulo}} </span>

                   <div class="flex flex-wrap text-sm pt-2">

                       <span class="basis-1/3 text-left"> {{$paper->created_at->diffForHumans()}} </span>
                       {{-- <span class="basis-1/3 text-center"> Pendiente {{$paper->estado}} </span> --}}
                  
                        <span class="basis-1/3 text-center"><a href="{{ route('paper.resultado' , $paper)}}"> Ver Calificacion Revisores {{$paper->evaluador->count()}} </a></span>
                       <a href="{{ route('paper.show' , $paper)}}" class="inline-block basis-1/3 text-right">Asignar Revisor</a>
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
