<x-app-layout>
        <div class="flex flex-col justify-center text-center pt-12 items-center ">

            <h2 class="pb-10">Papers</h2>

            @forelse($paper as $papers)

            <div class=" bg-gray-100 w-[1200px] text-left pt-1 py-3 px-5 rounded-xl hover:outline-2 hover:outline divide-y mb-4">

           <span class="text-blue-950 font-bold pb-1 inline-block my-1">  {{$papers->titulo}} </span>

           <div class="flex flex-wrap text-sm pt-2">
            <span class="basis-1/3 text-left"> {{$papers->created_at->diffForHumans()}} </span>
             <span class="basis-1/3 text-center"> Estado 
               @if($papers->estado == 0)
                        Sin evaluar 
               @else
                   {{$papers->estado}}
               @endif
             </span> 
            <a href="{{ route('paper.detalle' , $papers)}}" class="inline-block basis-1/3 text-right">Ver Detalle</a>
        </div>
     </div>
            @empty
            <p>No hay papers para mostrar</p>
        @endforelse   
     </div>
 </x-app-layout>