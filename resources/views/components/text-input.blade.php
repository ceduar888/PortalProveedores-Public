@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'text-sm border-gray-300 focus:border-[#b7c141] focus:ring-[#bfcd30] rounded-md shadow-sm']) !!}>
