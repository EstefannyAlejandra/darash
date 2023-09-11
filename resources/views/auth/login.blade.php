<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('styles')
    </head>
    <body>
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-white items-center">
    <!-- Session Status -->
    <x-auth-session-status class="w-[1100px] m-auto pt-8" :status="session('status')" />
        <div class="w-[800px]  m-auto sm:pt-0 md:pt-5 ">
        <div class="flex relative flex-row h-[480px] w-full  bg-white border-2 border-gray-700 rounded-[30px] m-auto items-center">
        <div class="relative h-full w-[50%] rounded-l-3xl p-12 pr-8 bg ">
        <h2 class="text-gray-700 text-5xl  font-bold">Iniciar sesión</h2>
    <form  class="mt-8 " method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
 
            <label class="text-gray-500 block mb-1 text-base" >Email</label>
            <input id="email" class="border border-none rounded-xl h-9 w-[100%] mb-4 bg-gray-300  pl-5 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        <!-- Password -->
   
            <label class="text-gray-500 block mb-1 text-base">Password</label>
            <input id="password" class="border border-none rounded-xl h-9 w-[100%] mb-2 bg-gray-300  pl-5 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
 

        <!-- Remember Me -->
       
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recordarme') }}</span>
            </label>
      

                <button class=" block transition-all hover:bg-blue-900 py-1 px-8 mt-3 rounded-xl bg-blue-700 text-white  border-2 hover:border-blue-300 text-sm font-semibold">
                    Ingresar 
                </button>
        </form>

        <section class="absolute bottom-0 mb-9 ">
            @if (Route::has('password.request'))
            <x-link class="text-gray-500 underline underline-offset-4 block mb-1 text-sm"
            :href="route('password.request')">
                Olvidaste tu contraseña?
            </x-link>
        @endif
           
            <x-link   
            :href="route('register')"  class="text-blue-600 underline underline-offset-4 block ">
                Crear Cuenta
             </x-link>
         
                </section>
                </div>
                <div class="relative h-full w-[50%] flex justify-center items-center">
            <div class="flex items-end w-[96.9%] bg-blue-700 h-[97.5%] rounded-[21px] bg-gradient-to-t from-black to-50%">
                <div class="m-7 mb-8">
                <h2 class="text-white text-3xl mb-4">Publica tu conocimiento.</h2>
                <h3 class="text-white text-sm w-80">Accede a la posibilidad de indexar tu articulo
                 en las mejores revistas del mundo.</h3>
                </div>
                </div>
            </div>
            </div>
            </div>
        
            <span class="mb-5 md:mb-7 text-xs md:text-sm lg:mb-10 text-gray-400">CESMAG - Todos los derechos reservados - 2023
            </span>
            <div class="w-16  h-16   fixed bottom-0 right-0 m-4 lg:m-6 lx:m-8">
            <img src="https://www.unicesmag.edu.co/wp-content/uploads/2022/07/logo_negro_unicesmag.png" >
            </div>
        </div>
  
    </body>
    @livewireScripts
    @stack('scripts')
    </html>