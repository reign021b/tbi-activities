@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center hover:text-blue-800 text-sm text-blue-800 font-semibold' :
    'inline-flex items-center hover:text-blue-800 text-sm text-black';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
