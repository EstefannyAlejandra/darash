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

            <div class="min-w-[400px] w-[80%] md:w-auto m-auto sm:pt-0 md:pt-5  ">
                <div class="flex relative flex-row h-full w-full  md:bg-white md:border-2 border-gray-700 rounded-[30px] m-auto items-center">
                    <div class="relative h-full md:w-[450px] w-full sm:p-8  sm:py-6">
                        <h2 class="text-gray-700 text-5xl  font-bold">Registrarse</h2>

            <form class="mt-4 " method="POST" action="{{ route('register') }}">
                @csrf

                <!--Primer Nombre -->
                <label class="text-gray-500 block text-base">Nombres</label>
                    <input id="name" class="border border-none rounded-xl h-9 w-[100%] mb-3 bg-gray-300  pl-5 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="" />

                    <!-- surname -->
                    <label class="text-gray-500 block text-base">Apellidos</label>
                        <input id="surname" class="border border-none focus:outline-none  rounded-xl h-9 w-[100%] mb-3 bg-gray-300 pl-5 placeholder:text-gray-400" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
                        <x-input-error :messages="$errors->get('surname')" class="" />

                    <!-- country --> 
                    <label class="text-gray-500 block text-base" >Pais</label>
                            <select id="country_id" name="country_id" class="border border-none focus:outline-none  rounded-xl h-9 w-[100%] mb-3 bg-gray-300 pl-5 placeholder:text-gray-400">
                                    <option> -- Seleccione -- </option>
                                    @foreach ($paises as $country)
                                    <option value="{{ $country->id }}"> {{ $country->nombre }} </option>
                                    @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('country_id')" class="" />
                        

                <!-- Email Address -->
                <label class="text-gray-500 block text-base" >Email</label>
                    <input id="email" class="border border-none focus:outline-none  rounded-xl h-9 w-[100%] mb-3 bg-gray-300 pl-5 placeholder:text-gray-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <!-- Password -->
                
                <label class="text-gray-500 block text-base" >Password</label>
                    <input id="password" class="border border-none focus:outline-none  rounded-xl h-9 w-[100%] mb-3 bg-gray-300 pl-5 placeholder:text-gray-400"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="" />

                <!-- Confirm Password -->

                <label class="text-gray-500 block text-base" >Confrimar Password</label>
                    <input id="password_confirmation" class="border border-none focus:outline-none  rounded-xl h-9 w-[100%] mb-3 bg-gray-300 pl-5 placeholder:text-gray-400"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="" />

                <button class=" block transition-all hover:bg-blue-900 py-1 px-8 mt-3 rounded-xl bg-blue-700 text-white  border-2 hover:border-blue-300 text-sm font-semibold">
                    Registrar
                </button>
            </form>

            <section class="absolute right-0 mr-10 mb-10 bottom-0">
                <a href="{{ route('login') }}" class="text-gray-500 underline underline-offset-4 block text-sm">¿Ya te encuentras registrado?</a>
                </section>
            </div>
         </div>
      </div>

      <span class="mb-5 md:mb-7 text-xs md:text-sm lg:mb-10 text-gray-400">CESMAG - Todos los derechos reservados - 2023
    </span>
    <div class="invisible md:visible w-16  h-16   fixed bottom-0 right-0 m-4 lg:m-6 lx:m-8">
      <img src="https://www.unicesmag.edu.co/wp-content/uploads/2022/07/logo_negro_unicesmag.png" >
    </div>
            </div>
         
        </body>
        @livewireScripts
        @stack('scripts')
    </html>