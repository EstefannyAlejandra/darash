@vite(['resources/css/app.css', 'resources/js/app.js'])
        <div class="flex justify-center items-center w-full h-screen ">
            <div class="flex flex-col text-center rounded-3xl  py-10 border-2 border-gray-700  px-20 justify-between items-center ">
              <div class="">
                <h1 class="text-gray-700 text-7xl mb-2  font-bold ">DARASH</h1>
              <h2 class="text-sm ">El avance de la humanidad paper a paper.</h2>
              </div>
              <div class="flex w-[70%] justify-center mt-10 items-center" >
                <a href="{{ route('login') }}" class=" mx-4 px-3 py-1 hover:bg-blue-900 hover:text-white rounded-lg border-2 transition ">Ingresar</a>
                <a href="{{ route('register') }}" class=" mx-4 px-3 py-1 hover:bg-blue-900 hover:text-white rounded-lg border-2 transition">Registrarse</a>
                </div>
            </div>
            <span class="  text-xs fixed md:text-sm mb-12 text-gray-400 bottom-0">CESMAG - Todos los derechos reservados - 2023
            </span>
            <div class=" w-16  h-16   fixed bottom-0 right-0  m-8">
              <img src="https://www.unicesmag.edu.co/wp-content/uploads/2022/07/logo_negro_unicesmag.png" >
            </div>
          </div>


