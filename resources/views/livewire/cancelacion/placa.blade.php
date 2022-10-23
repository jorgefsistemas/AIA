<div class="container">
    <br>
    <form wire:submit.prevent='submit' method="POST">
        <div class="card">
            <div class="card-header" style="background-color: #721422">
                @if($oficio)
                <h4 class="text-white">Folio Cancelación: {{$oficio  ?: 'default'}} </h4>
                @else
                <h4 class="text-white">Información del trámite:</h4>
                @endif
            </div>
            <div class="card-body">
                @include('datos_generales.datos_generales')
                @include('tramites.tramites_sicove')
                <br>
            </div>
        </div>
        <div class="text-right">
            <button type="sumbit" class="btn btn-lg btn-danger" wire:loading.delay.attr="disabled" wire:click='incorrecto' >Incorrecto</button>
        </div>
    </form>
</div>
