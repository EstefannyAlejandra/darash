@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-500 block mb-1 text-xl']) }}>
    {{ $value ?? $slot }}
</label>
 