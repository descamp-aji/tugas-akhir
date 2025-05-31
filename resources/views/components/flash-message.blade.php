@props(['type' => 'info', 'message'])

@php
    $validTypes = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
    $alertType = in_array($type, $validTypes) ? $type : 'info';
@endphp

@if ($message)
    <div class="alert alert-{{ $alertType }} alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
