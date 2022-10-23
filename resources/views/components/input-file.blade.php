@props([
    'id' => uniqid(),
    'name' => isset($name) ? $name : $id,
    'label' => null,
    'wire' => false,
    'wiredefer' => false,
    'row' => false,
    'accept' => false,
    'required' => false,
    'readonly' => false,
    'revisapdfsize' => false,
    'max-file-size'=> false,
    'maxfilesize'=> false,
    'filepasses'=> false,


])

@php
if($wire == 1){
    $wire = $name;
    $wire = str_replace('[','.',$wire);
    $wire = str_replace(']','',$wire);
}

if($wiredefer == 1){
    $wiredefer = $name;
    $wiredefer = str_replace('[','.',$wiredefer);
    $wiredefer = str_replace(']','',$wiredefer);
}

if (str_contains($row, '-')) {
    $cols = explode('-', $row);
    $mincol = $cols[0];
    $maxcol = $cols[1];
} else {
    $mincol = (int) $row < 1 ? 1 : (int) $row;
    $maxcol = 12 - $mincol;
}
@endphp

<div class="form-group m-2 @if($row) row @endif  ">

    @isset($label)
        <label class="text-muted">{{ $label }}</label>
    @endisset

    <input
    class="form-control-file @error($name) is-invalid @enderror"
    name="{{ $name }}"
    id="{{ $name }}"
    @if ($accept) accept="{{ $accept }}" @endif
    @if ($wire) wire:model="{{$wire}}"
    @elseif ($wiredefer) wire:model.defer="{{$wiredefer}}" @endif
    @if ($required) required @endif
    @if ($readonly) readonly @endif
    @if ($revisapdfsize) onchange="pdfsize(this)" @endif
    type="file">

    @error($name) <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>
{{-- <div class="d-inline">
 <img id="{{ $name }}.img" wire src="#" alt="Imagen" />
</div> --}}
<script>
        function pdfsize(value){
            let extension= value.value.split('.');
            let arr = value['id'].split('.');
            let arrsel=parseInt(arr[1]);
            let extensiones = ["jpg", "JPG"];

            // if (extension[1]!='jpg' || extension[1]!='JPG') {
            if (!extensiones.includes(extension[1])) {
                Swal.fire({
                        icon: 'error',
                        title: `La extensión ${extension[1]} no es válida`,
                        text: `Solo archivos .jpg`,
                    }).then(function() {
                    value.value = "";

                    });
                    return false;
            }

        const MAXIMO_TAMANIO_BYTES = 4000000; // 1MB = 1 millón de bytes
        // Validamos el primer archivo únicamente
        const archivosize = value.files[0].size;
        const archivosizemb = financial(((value.files[0].size)/1000000));

        if (archivosize > MAXIMO_TAMANIO_BYTES) {
            const tamanioEnMb = financial(MAXIMO_TAMANIO_BYTES / 1000000);
            Swal.fire({
                        icon: 'error',
                        title: `El tamaño máximo es ${tamanioEnMb} MB`,
                        text: `Este archivo mide ${archivosizemb} MB`,
                    }).then(function() {
                    value.value = "";

                    });
                    return false;
        }

        else {
            window.livewire.emit('archivoValido',arrsel);



            // Validación pasada. Envía el formulario o haz lo que tengas que hacer
        }
    }

    function financial(x) {
    return Number.parseFloat(x).toFixed(2);
        }

        function vistaPrevia(){


        }
</script>
