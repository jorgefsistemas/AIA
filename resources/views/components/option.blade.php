@props([
    'default' => false,
    'value' => ''
])

@php
    if ($default) {
        $slot = 'Seleccione una opción';
    }
@endphp

<option value="{{ $value }}" @if ($default) selected @endif>{{ $slot }}</option>
