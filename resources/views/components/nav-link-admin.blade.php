@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-[#bfcd30] text-md text-[#0f2a3b] font-medium leading-5 focus:outline-none focus:border-[#9b9522] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 text-md text-[#0f2a3b] font-medium leading-5 hover:border-b-4 hover:border-[#bfcd30] focus:outline-none focus:border-[#9b9522] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>