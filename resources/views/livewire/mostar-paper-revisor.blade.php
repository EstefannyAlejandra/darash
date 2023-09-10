<div>
    @auth
      
        <div class="flex flex-col justify-center text-center pt-12 items-center ">
                <h2 class="pb-10">Papers</h2>
                @forelse($revisor as $paper)
                 
                <div 
                 @if($paper->calificacion)
                 class=" bg-green-100 w-[1200px] text-left pt-1 py-3 px-5 rounded-xl hover:outline-1 hover:outline divide-y mb-4"   
                 @else 
                  class=" bg-gray-100 w-[1200px] text-left pt-1 py-3 px-5 rounded-xl hover:outline-1 hover:outline divide-y mb-4"
                   @endif>
                
                    <span class="text-blue-950 font-bold pb-1 inline-block my-1"> {{ $paper->paper->titulo }} </span>
 
                    <div class="flex flex-wrap text-sm pt-2">
 
                        <span class="basis-1/3 text-left"> {{$paper->created_at->diffForHumans()}} </span>
                         <span class="basis-1/3 text-center"> Status:   
                            @if($paper->calificacion)
                               {{$paper->calificacion}}
                            @else 
                                Sin Revision
                            @endif
                         </span>
                        <a href="{{ route('revisor.show' , $paper->paper->id)}}" class="inline-block basis-1/3 text-right"> Ver publicación</a>
                     </div>
                  </div>
                      @empty
                      <p>No hay papers asignados para ser evaluados</p>
                   @endforelse
                    <div class="flex justify-center">
                          {{ $revisor->links() }}
                     </div>
                </div>
          @endauth
</div>
