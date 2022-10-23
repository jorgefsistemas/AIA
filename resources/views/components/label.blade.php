@props([
    'label' => null,
    'fill' => false,
    'row' => false, // row="2" or row="2-2"
])

@php
if (str_contains($row, '-')) {
    $cols = explode('-', $row);
    $mincol = $cols[0];
    $maxcol = $cols[1];
} else {
    $mincol = (int) $row < 1 ? 1 : (int) $row;
    $maxcol = 12 - $mincol;
}
@endphp

<div class="@if ($row) row @endif mr-2 @if($fill) flex-fill @endif">

    @isset($label)
        <label class="text-md-right font-weight-bold text-muted @if ($row) col-md-{{ $mincol }} @endif">{{ $label }}</label>
    @endisset

    <div class="p-2 mb-2 bg-light text-dark @if ($row) col-md-{{ $maxcol }} @endif">
        {{ $slot }}
    </div>

</div>
