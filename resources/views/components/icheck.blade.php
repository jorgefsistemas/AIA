@props([
    'id' => uniqid(),
    'name' => isset($name) ? $name : $id,
    'wire' => false,
    'required' => false
])

<div class="form-check m-2">
    <label class="container">{{ $slot }}
        <input type="checkbox" id="{{ $id }}" name="{{ $name }}" style="display: none"
        @if ($wire) wire:click="{{ $wire }}" @endif
            @if ($required)required @endif>
        <span class="checkmark"></span>
        @error($name) <span class="invalid-feedback">{{ $message }}</span> @enderror

    </label>
</div>

@section('css')
<style>
    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked~.checkmark {
        background-color: #38c172;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked~.checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>
@endsection
