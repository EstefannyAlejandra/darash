
<form class="md:w-1/2" wire:submit.prevent='editarEvento'>
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="Nombre Evento" :value="__('Nombre Evento')" />
        <x-text-input 
         id="name"
         class="block mt-1 w-full" 
         type="text"
         wire:model="name" 
          required autofocus />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Fecha fin evento -->
    <div class="mt-4">
        <x-input-label for="fecha_fin" :value="__('Fecha Final')" />
        <x-text-input 
         id="fecha_fin" 
         class="block mt-1 w-full" 
         type="date"
         wire:model="fecha_fin"
         required autocomplete="fecha_fin" />
        <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
    </div>

    <x-primary-button class="text-black block bg-white py-2 px-8 mt-4 rounded-xl w-1/2 justify-center">
            Actualizar
    </x-primary-button>
</form>

