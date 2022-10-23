<div>
    <br>
    <form wire:submit.prevent='submit' method="POST">
        <div class="card">
            <div class="card-header" style="background-color: #721422">
                <h4 class="text-white">Información del trámite Cancelado:</h4>
            </div>
            <div class="card-body">
                @include('tramites.tramites_cancelaciones')
                <br>
            </div>
        </div>
        <div class="text-right">
            <button type="sumbit" class="btn btn-lg btn-danger" wire:loading.delay.attr="disabled"  >Incorrecto</button>
            <button type="sumbit" class="btn btn-lg btn-success" wire:loading.delay.attr="disabled">Correcto</button>
        </div>
    </form>
</div>
