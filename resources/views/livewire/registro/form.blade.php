    <div>
    <form wire:submit.prevent='submit' method="POST">

        <div class="card align-content-center">
            <div class="card-header" style="background-color: #721422">
                <h4 class="text-white">*:</h4>
            </div>
            <div class="card-body">
                @if (trim($alert) != '')
                    <x-alert close>{{ $alert }}</x-alert>
                @endif

                {{-- @if($auto->fotografia)
                {{ $auto->fotografia ? $auto->fotografia :'' }}
                @endif --}}
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">*</h5>
                                <x-alert alert="info">Con esta opción se mostrará el registro de autos.</x-alert>

                                {{-- <p class="card-text">Con esta opción se mostrará el registro de autos.</p> --}}
                                @if (session()->has('danger'))
                                    <span class="error-message" style="color: red;"> {{ session('danger') }}</span>
                                @endif
                                <div class="d-flex flex-row flex-wrap">
                                    <x-select id="auto.marca" name="auto.marca" required wire label="Marca" fill>
                                        <x-option default value=null></x-option>
                                        @foreach ($marcas['marca'] ?? [] as $marcasel)
                                            <x-option value="{{ $marcasel['id'] }}">{{ $marcasel['name'] }}</x-option>
                                        @endforeach
                                    </x-select>

                                    <x-select id="auto.modelo" name="auto.modelo" required wire label="modelo" fill>
                                        <x-option default></x-option>
                                        @foreach ($modelos['modelo'] ?? [] as $value => $d)
                                            <x-option value="{{ $d['id'] }}">{{ $d['name'] }}</x-option>
                                        @endforeach
                                    </x-select>
                                    @php $last= date('Y')-70; @endphp

                                    <x-select id="auto.anio" name="auto.anio" wire required label="año">
                                        {{ $last = date('Y') - 120 }}
                                        {{ $now = date('Y') }}
                                        <x-option default></x-option>
                                        @for ($i = $now; $i >= $last; $i--)
                                            <x-option value="{{ $i }}">{{ $i }}</x-option>
                                        @endfor
                                    </x-select>
                                    <x-input type="currency" id="auto.precio" wiredefer maxlength="8" size="15"
                                        name="auto.precio" required label="precio" revisasolonum copypaste>321</x-input>
                                    <x-input id="auto.kilometraje" wiredefer maxlength="8" size="16"
                                        name="auto.kilometraje" required label="kilometraje" revisasolonum copypaste
                                        minlength="3">321</x-input>
                                    <x-input id="auto.color" wiredefer maxlength="30" size="16" name="auto.color"
                                        required label="Color" revisacurp copypaste minlength="3">321</x-input>
                                    <x-input id="auto.email" wiredefer maxlength="30" size="16" name="auto.email"
                                        required label="correo" revisasoloemail copypaste minlength="3">j@gmail.com
                                    </x-input>
                                    <x-input id="auto.telefono" wiredefer maxlength="10" size="10"
                                        name="auto.telefono" required label="Telefono" revisacurp copypaste
                                        minlength="3">3216549871</x-input>
                                    <x-input-file wire class="fa fa-file-pdf text-red mr-2" id="fotografia"
                                        label="Fotografia" name="fotografia" revisapdfsize></x-input-file>
                                </div>
                                <button type="sumbit" class="btn btn-lg btn-success"
                                    wire:loading.delay.attr="disable">Enviar</button>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>