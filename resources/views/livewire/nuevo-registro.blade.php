<div>
    <x-alert error close></x-alert>
    <br>
    <form wire:submit.prevent='submit' method="POST">
        <div class="card">
            <div class="card-header" style="background-color: #721422">
                <h4 class="text-white">Ingresa los Siguientes datos:</h4>
            </div>
            <div class="card-body">
                @if (trim($alert) != '')
                <x-alert close>{{ $alert }}</x-alert>
                @endif
                @include('datos_generales.datos_generales')
            </div>
        </div>
        <div class="text-right">
            <button type="sumbit" class="btn btn-lg btn-success" wire:loading.delay.attr="disabled">Guardar
                datos</button>
        </div>
    </form>
</div>
