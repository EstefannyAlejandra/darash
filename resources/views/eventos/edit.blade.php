<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                  <h1 class="text-acl font-bold text-center mb-10">Editar Evento: {{ $evento->name }} </h1>
                    <div class=" md-justify-center p-5">
                           <livewire:editar-evento 
                            :evento="$evento"
                           />
                    </div>

                </div>
            </div>
        </div>
    </div> 
</x-app-layout>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endpush


        
