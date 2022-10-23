@props([
    'type' => 'button',
    'icon' => null,
    'wire' => false,
    'bg' => 'success',
    'tomafoto' => false,


])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-' . $bg]) }} @if ($wire) wire:click="{{ $wire }}" @endisset>
{{-- <button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn btn-' . $bg]) }} @if ($wire) wire:click="{{ $wire }}" @endisset> --}}

{{ $slot }}@isset($icon) <i class="{{ $icon }} ml-2"></i> @endisset
</button>
