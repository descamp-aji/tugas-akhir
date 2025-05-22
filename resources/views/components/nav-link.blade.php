@props(['active' => false])

@php
    $classes = ($active ?? false) ? 'nav-link active' : 'nav-link';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes, 'aria-current' => 'page'])}}>
    {{$slot}}
</a>