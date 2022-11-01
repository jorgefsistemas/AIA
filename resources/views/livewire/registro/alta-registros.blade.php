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
                <h4 class="text-white">*:</h4>
            </div>
            <div class="card-body">
                @if (trim($alert) != '')
                    <x-alert close>{{ $alert }}</x-alert>
                @endif
                {{ $auto->fotografia }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">*</h5>
                                <x-alert alert="info">Con esta opción se mostrará el registro de autos.</x-alert>

                                <p class="card-text">Con esta opción se mostrará el registro de autos.</p>
                                @if (session()->has('danger'))
                                    <span class="error-message" style="color: red;"> {{ session('danger') }}</span>
                                @endif
                                <div class="d-flex flex-row flex-wrap">
                                    <x-select id="auto.marca"  name="auto.marca" required wire label="Marca" fill>
                                        <x-option default value=null></x-option>
                                        @foreach ($marcas['marca'] ?? [] as $marcasel)
                                            <x-option value="{{ $marcasel['id'] }}">{{ $marcasel['name'] }}</x-option>
                                        @endforeach
                                    </x-select>

                                    <x-select id="auto.modelo"  name="auto.modelo" required wire label="modelo" fill>
                                        <x-option default ></x-option>
                                        @foreach ($modelos['modelo'] ?? [] as $value => $d)
                                            <x-option value="{{ $d['id'] }}">{{ $d['name'] }}</x-option>
                                        @endforeach
                                    </x-select>
                                    @php $last= date('Y')-70; @endphp

                                    <x-select id="auto.anio" name="auto.anio" wire required label="año">
                                        {{ $last = date('Y') - 120 }}
                                        {{ $now = (date('Y')) }}
                                         <x-option default></x-option>
                                        @for ($i = $now; $i >= $last; $i--)
                                            <x-option value="{{ $i }}">{{ $i }}</x-option>
                                        @endfor
                                    </x-select>
                                    <x-input type="currency" id="auto.precio" wire maxlength="8" size="15" name="auto.precio"
                                        required label="precio"  revisasolonum  copypaste >321</x-input>
                                    <x-input id="auto.kilometraje" wire  maxlength="8" size="16" name="auto.kilometraje" required
                                        label="kilometraje"  revisasolonum copypaste minlength="3">321</x-input>
                                    <x-input id="auto.color" wire maxlength="30" size="16" name="auto.color" required
                                        label="Color"  revisacurp copypaste minlength="3">321</x-input>
                                    <x-input id="auto.email" wire maxlength="30" size="16" name="auto.email" required
                                        label="correo"  revisasoloemail copypaste minlength="3">j@gmail.com</x-input>
                                    <x-input id="auto.telefono" wire maxlength="10" size="10" name="auto.telefono" required
                                        label="Telefono"  revisacurp copypaste minlength="3">3216549871</x-input>
                                    {{-- <x-input-file class="fa fa-file-pdf text-red mr-2"
                                        id="auto.fotografia" label="Fotografia" name="auto.fotografia" wire
                                        accept="image/jpeg,image/gif,image/png,image/x-eps,image/*" revisapdfsize
                                        ></x-input-file>--}}
                                    <x-input-file wire  class="fa fa-file-pdf text-red mr-2" id="fotografia" label="Fotografia" name="fotografia"  revisapdfsize ></x-input-file>
                                    {{-- <x-input type="date" id="falta" maxlength="7" size="16" name="falta"
                                        required label="Fecha de Alta" wiredefer revisacurp copypaste minlength="3">
                                    </x-input>
                                    <x-input type="date" id="fmodificacion" maxlength="7" size="16"
                                        name="fmodificacion" required label="Fecha Modificacion" wiredefer revisacurp
                                        copypaste minlength="3"></x-input>
                                    <x-input type="date" id="feliminacion" maxlength="7" size="16"
                                        name="feliminacion" required label="Fecha de eliminacion" wiredefer revisacurp
                                        copypaste minlength="3"></x-input> --}}
                                </div>
                                <button type="sumbit" class="btn btn-lg btn-success"
                                    wire:loading.delay.attr="disabled">Enviar</button>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- inicio tabla --}}
            <div class="row">
            <div class="col-md-12 bg-white" style="padding: 15px;">
                <table id="mostrar_registros" class="table table-responsive-lg table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">marca</th>
                            <th scope="col">modelo</th>
                            <th scope="col">año</th> 
                            <th scope="col">precio</th>
                            <th scope="col">kilometraje</th>
                            <th scope="col">color</th>
                            <th scope="col">email</th>
                            <th scope="col">telefono</th>
                            <th scope="col">fotografia</th>
                            <th scope="col">ruta</th>
                            {{-- <th scope="col">alta</th>
                            <th scope="col">modificado</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($autos as $auto)
                        {{-- @php $tramite->municipio=$tramite->ciudadano->domicilio['municipio'];@endphp --}}
                            <tr>



                                <td>{{ $auto->marca ?? '' }}</td>
                                <td>{{ $auto->modelo ?? '' }}</td>
                                <td>{{ $auto->anio ?? '' }}</td>
                                <td>{{ $auto->precio ?? '' }}</td>
                                <td>{{ $auto->kilometraje ?? '' }}</td>
                                <td>{{ $auto->color ?? '' }}</td>
                                <td>{{ $auto->email ?? '' }}</td>
                                <td>{{ $auto->telefono ?? '' }}</td>
                                <td>{{ $auto->forografia ?? '' }}</td>
                                <td>{{ $auto->ruta ?? '' }}</td>
                                {{-- <td>{{ $auto->created_at->format('d-m-Y') ?? '' }}</td>
                                <td>{{ $auto->updated_at->format('d-m-Y') ?? '' }}</td> --}}
                                
                                    {{-- <a href="{{ route('pdf:constancia',encrypt($auto->id))}}" target='_blank' class="btn btn-success">Imprimir</a> --}}
                                    {{-- <button wire:click='downloadOpen({{$tramite}})' type="button" class="btn btn-success">Imprimir</button> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- fin tabla --}}
</div>
