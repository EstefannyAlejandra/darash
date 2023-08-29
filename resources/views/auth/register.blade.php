<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!--Primer Nombre -->
        <div>
            <x-input-label for="name" :value="__('Nombres')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

             <!-- surname -->
             <div>
                <x-input-label for="surname" :value="__('Apellidos')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <!-- surname --> 
                <div>
                    <x-input-label for="country" :value="__('Pais')" />
                    <select id="country_id" name="country_id">
                            <option> -- Seleccione -- </option>
                            @foreach ($paises as $country)
                            <option value="{{ $country->id }}"> {{ $country->nombre }} </option>
                            @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('country_id')" class="mt-2" />
                </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                ¿Ya te encuentras registrado?
            </a>
        </div>
        <x-primary-button class="text-black block bg-white py-2 px-8 mt-4 rounded-xl w-1/2 justify-center">
            registrar
        </x-primary-button>
    </form>
</x-guest-layout>
