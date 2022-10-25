@props([
    'id' => uniqid(),
    'name' => isset($name) ? $name : $id,
    'type' => 'text',
    'label' => null,
    'readonly' => false,
    'required' => false,
    'value' => false,
    'wire' => false,
    'row' => false, // row="2" or row="2-2"
    'fill' => false,
    'disabled' => false,
    'min' => false,
    'wirechange' => false,
    'selmarca' =>false

])

@php
    if(str_contains($row,'-')){
        $cols = explode('-',$row);
        $mincol = $cols[0];
        $maxcol = $cols[1];
    }else{
        $mincol = (int)$row < 1 ? 1 : (int)$row;
        $maxcol = 12 - $mincol;
    }
@endphp

<div class="form-group m-2 @if($fill) flex-fill @endif  @if($row) row @endif">

    @isset($label)
        <label class="text-muted font-weight-bold @if($row) col-md-{{ $mincol }} @endif">{{ $label }}</label>
    @endisset

    <select
    class="form-control @if($row) col-md-{{ $maxcol }} @endif @error($name) is-invalid @enderror"
        name="{{ $name }}"
        id="{{ $id }}"
        @if ($required) required @endif
        @if ($value) value="{{ $value }}" @endif
        @if ($disabled) readonly @endif
        @if ($wire) wire:model="{{ $wire !== true ? $wire : $name }}" @endif
        @if ($wirechange) wire:change="{{ $wirechange }}" @endif
        @if ($selmarca) onclick="marcaseleccionada(event)" @endif




    >

      {{$slot}}

    </select>

    @error($name) <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>
@section('js')
    <script>
            function marcaseleccionada(evt) {
            var code = (evt.which)? evt.which : evt.keyCode;
            console.log("has presionado: " + evt.target.value);
           

        }
    </script>
@endsection
