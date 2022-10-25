@props([
    'id' => uniqid(),
    'name' => isset($name) ? $name : $id,
    'type' => 'text',
    'label' => null,
    'readonly' => false,
    'required' => false,
    'placeholder' => 'Ingresa Aquí',
    'wirechange' => false,
    'wirekeyup' => false,
    'wirekeyupenter' => false,
    'wire' => false,
    'wiredefer' => false,
    'row' => false, // row="2" or row="2-2"
    'fill' => false,
    'small' => false,
    'size' => false,
    'max' => false,
    'min' => false,
    'minlength' => false,
    'maxlength' => false,
    'pattern' => false,
    'revisacurp' => false,
    'revisacurpsinespacios' => false,
    'revisacurpsinespaciosconguiones' => false,
    'copypaste' => false,
    'revisasolonum' => false,
    'revisasoloemail' => false,
    
])

@php
if ($wire == 1) {
    $wire = $name;
    $wire = str_replace('[', '.', $wire);
    $wire = str_replace(']', '', $wire);
}

if ($wiredefer == 1) {
    $wiredefer = $name;
    $wiredefer = str_replace('[', '.', $wiredefer);
    $wiredefer = str_replace(']', '', $wiredefer);
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

<div
    class="form-group mt-2 mr-2
            @if ($fill) flex-fill @endif
            @if ($row) row @endif">

    @isset($label)
        <label
            class="text-muted font-weight-bold
            @if ($row) col-md-{{ $mincol }} @endif">
            {{ $label }}
        </label>
    @endisset

    <input
        class="form-control text-uppercase
                @if ($row) col-md-{{ $maxcol }} @endif
                @error($name) is-invalid @enderror"
        name="{{ $name }}" id="{{ $id }}"
        @if ($size) size="{{ $size }}" @endif
        @if ($max) max="{{ $max }}" @endif
        @if ($min) min="{{ $min }}" @endif
        @if ($pattern) pattern="{{ $pattern }}" @endif
        @if ($minlength) minlength="{{ $minlength }}" @endif
        @if ($maxlength) maxlength="{{ $maxlength }}" @endif
        @if ($readonly) readonly @endif @if ($required) required @endif
        @if ($revisacurp) onkeypress ="return  validaCaracter(event);" onkeyup="validaCaracterMobile(event);" @endif
        @if ($revisacurpsinespacios) onkeypress ="return validaCaracterSinEspacios(event);" onkeyup="validaCaracterSinEspaciosMobile(event);" @endif
        @if ($revisacurpsinespaciosconguiones) onkeypress ="return validaCaracterConGuionesDiagonal(event);" @endif
        @if ($revisasolonum) onkeypress ="return  soloNumeros(event);" onkeyup="soloNumerosMobile(event);" @endif
        @if ($revisasoloemail) onkeypress ="return  soloEmail(event);" onkeyup="soloEmailMobile(event);" @endif
        @if ($copypaste) oncopy="return false" onpaste="return false" @endif
        @if ($wire) wire:model="{{ $wire }}"
            @elseif ($wiredefer) wire:model.defer="{{ $wiredefer }}" @endif
        @if ($wirekeyup) wire:keyup="{{ $wirekeyup }}" @endif
        @if ($wirekeyupenter) wire:keyup.enter="{{ $wirekeyupenter }}" @endif

        @if ($wirechange) wire:change="{{ $wirechange }}" @endif type="{{ $type }}"
        placeholder="{{ $placeholder }}" value="{{ $slot }}">

    @isset($small)
        <small class="form-text text-muted">{{ $small }}</small>
    @endisset

    @error($name)
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror

</div>

@section('js')
    <script>
                function validaCaracterConGuionesDiagonal(evt) {
                    var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8 || code == 45 || code == 47) { // backspace.
                return true;
            } else if ((code >= 48 && code <= 57) || (code >= 65 && code <= 90) || (code >= 97 && code <=
                122)) { // is validate.
                return true;
            } else { // other keys.
                return false;
            }
        }
        function validaCaracter(evt) {
            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8 || code == 32) { // backspace.
                return true;
            } else if ((code >= 48 && code <= 57) || (code >= 65 && code <= 90) || (code >= 97 && code <=
                122)) { // is validate.
                return true;
            } else { // other keys.
                return false;
            }
        }

        // para Moviles
        // function numberMobile(e){ e.target.value = e.target.value.replace(/[^\d]/g,''); return false; }
        function validaCaracterMobile(e) {
            e.target.value = e.target.value.replace(/[^A-Za-z0-9\s]+/g, '');
            return false;
        }

        function validaCaracterSinEspacios(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8 || code == 13) { // backspace.
                return true;
            } else if ((code >= 48 && code <= 57) || (code >= 65 && code <= 90) || (code >= 97 && code <=
                122)) { // is validate.
                return true;
            } else { // other keys.
                return false;
            }
        }
        function validaCaracterSinEspaciosMobile(e) {
            e.target.value = e.target.value.replace(/[^A-Za-z0-9]+/g, '');
            return false;
        }

        function soloNumeros(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) { // backspace.
                return true;
            } else if ((code >= 48 && code <= 57)) { // is validate.
                return true;
            } else { // other keys.
                return false;
            }
        }
        // para movil
        function soloNumerosMobile(e) {
            e.target.value = e.target.value.replace(/[^\d]/g, '');
            return false;
        }

        function soloEmail(evt) {
            var code = evt.which;
            if (code == 8) { // backspace.
                return true;
            } else if ((code >=48 && code <=57) || (code >=65 && code <=90) || (code >=97 && code <=122) || (code ==64 || code ==95 || code ==45 || code ==46)) { // is validate.
                return true;
            } else { // other keys.
                return false;
            }
        }
        // function soloEmailMobile(e){ e.target.value = e.target.value.replace(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,''); return false; }
        // function soloEmailMobile(e){ e.target.value = e.target.value.replace(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,''); return false; }
        function soloEmailMobile(e) {
            e.target.value = e.target.value.replace(/[^A-Za-z0-9\@\.\s]+/g, '');
            return false;
        }


    </script>
@endsection
