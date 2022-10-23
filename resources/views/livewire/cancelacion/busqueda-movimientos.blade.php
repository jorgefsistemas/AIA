<div class="container">
    <x-alert error close></x-alert>
    {{-- @if (session()->has('danger'))
    <x-alert close alert="danger">{{ session('danger') }}</x-alert>
    @endif --}}
    <br>
            <div class="card align-content-center">
                <div class="card-header" style="background-color: #166fa6">

                    @if($oficio)
                    <h4 class="text-white">Folio Cancelación: {{$oficio  ?: 'default'}} </h4>
                    @else
                    <h4 class="text-white">Seleccione placa para buscar movimiento cancelado: </h4>
                    @endif
                </div>
                <div  class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Busqueda de movimientos Cancelación por placa</h5>
                                   <x-alert alert="info">Con esta opción se mostrará si hay movimientos cancelados.</x-alert>
                                    <x-input id="placa" maxlength="7" size="7" name="placa" wiredefer required label="Placa"
                                        revisacurpsinespacios copypaste minlength="7"  wirekeyupenter="search" ></x-input>
                                        <button type="button" wire:click="search" class="btn btn-success" wire:loading.remove>Enviar Busqueda</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                        @if (count($cancelaciones) > 0)
                            @include('datos_generales.datos_generales_cancelacion')

                            @else
                                <x-alert alert="warning">Ingresa una placa para buscar</x-alert>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
</div>
