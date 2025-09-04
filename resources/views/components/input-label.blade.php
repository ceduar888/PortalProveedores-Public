@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {!! $value ? str_replace('*', '<span class="text-red-500">*</span>', $value) : $slot !!}
</label>
