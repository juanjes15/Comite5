@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-1.5 block mt-1 w-full rounded-md']) !!}>