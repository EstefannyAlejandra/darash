@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border border-none rounded-xl h-11 md:w-[100%] w-[380px]  bg-gray-300 text-xl pl-5 focus:outline-none   focus:placeholder:text-gray-500 focus:valid:ring-blue-400  cursor-pointer']) !!}>


{{-- quite un mt-7 --}}
