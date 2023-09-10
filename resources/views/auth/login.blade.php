<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="w-[1100px] m-auto pt-8" :status="session('status')" />
  
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <div class="flex  justify-between my-5">
          
            <x-link   
            :href="route('register')"
            >
                Crear Cuenta
             </x-link>

             @if (Route::has('password.request'))
                <x-link
                :href="route('password.request')">
                    Olvidaste tu contraseña?
                </x-link>
            @endif
         
        </div>
        <button class="block py-2 px-8 mt-2 rounded-xl w-1/2 justify-center bg-black text-white font-bold">
                Ingresar 
        </button>
    </form>

</div>
</x-guest-layout>
