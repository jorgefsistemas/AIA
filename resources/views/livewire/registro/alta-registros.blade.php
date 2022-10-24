<div class="container">
    <x-alert error close></x-alert>
    @if (session()->has('danger'))
    <x-alert close alert="danger">{{ session('danger') }}</x-alert>
    @endif
    <br>
    <div class="card-body text-center" wire:loading>
        <div class="spinner-border ml-2" role="status">
            <span class="sr-only">CARGANDO...</span>
        </div>
    </div>

        <form wire:submit.prevent='submit' method="POST">

            <div class="card align-content-center">
                <div class="card-header" style="background-color: #721422">
                    <h4 class="text-white">Administrador de inventario de autos:</h4>
                </div>
                <div class="card-body">
                    @if (trim($alert) != '')
                    <x-alert close>{{ $alert }}</x-alert>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Administrador de inventario de autos</h5>
                                    <x-alert alert="info">Con esta opción se mostrará el registro de autos.</x-alert>

                                    <p class="card-text">Con esta opción se mostrará el registro de autos.</p>
                                        @if (session()->has('danger'))
                                        <span class="error-message" style="color: red;">     {{ session('danger') }}</span>
                                        @endif
                                    {{-- <x-input id="marca" maxlength="7" size="7" name="marca" wiredefer required label="Marca"
                                        revisacurpsinespacios copypaste minlength="7"></x-input> --}}
                                        <div class="d-flex flex-row flex-wrap">
                                            <x-select id="marca" required wire label="Marca" fill>
                                                <x-option default></x-option>
                                                 @foreach ($marca['marca'] ?? [] as $value => $d)
                                                    <x-option  value="{{ $d['id'] }}" >{{
                                                    $d['name']}}</x-option>
                                                @endforeach
                                            </x-select>

                                        </div>
                                        <button type="sumbit" class="btn btn-lg btn-success" wire:loading.delay.attr="disabled">Enviar</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br>


                </div>
            </div>
        </form>
</div>
