<div class="container">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <link href="{{ asset('js/app.js') }}" rel="stylesheet"> --}}
    <x-alert error close></x-alert>
    @if (session()->has('danger'))
        <x-alert close alert="danger">{{ session('danger') }}</x-alert>
    @endif
    <br>
    <div>
    </div>


    {{-- <form wire:submit.prevent='submit' method="POST">

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

                                <p class="card-text">Con esta opción se mostrará el registro de autoss.</p>
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
    </form> --}}
    {{-- resources/views/livewire/registro/form.blade.php --}}
                                    {{-- <x-alert alert="info">Con esta opción se mostrará el registro de autos.</x-alert> --}}

    @include('livewire.registro.form')
    {{-- inicio tabla --}}
    <div class="card-body text-center" wire:loading>
        <div class="spinner-border ml-2" role="status">
            <span class="sr-only">CARGANDO...</span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 bg-white" style="padding: 15px;">
            <table id="mostrar_registros" class="table table-responsive-lg  table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th  class="width:1" >#</th>
                        <th >marca</th>
                        <th >modelo</th>
                        <th >año</th>
                        <th >precio</th>
                        <th >kilometraje</th>
                        <th >color</th>
                        <th >email</th>
                        <th >telefono</th>
                        <th >fotografia</th>
                        <th  >ruta</th>
                        <th >acciones</th>
                        {{-- <th scope="col">alta</th>
                            <th scope="col">modificado</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autos['auto'] as $auto)
                        <tr>


                            <td>{{ $loop->index+1}}</td>
                            <td style="width: 1% !important;">{{ $auto['marca'] ?? '' }}</td>
                            <td>{{ $auto['modelo'] ?? '' }}</td>
                            <td>{{ $auto['anio'] ?? '' }}</td>
                            <td>{{ $auto['precio'] ?? '' }}</td>
                            <td>{{ $auto['kilometraje'] ?? '' }}</td>
                            <td>{{ $auto['color'] ?? '' }}</td>
                            <td>{{ $auto['email'] ?? '' }}</td>
                            <td>{{ $auto['telefono'] ?? '' }}</td>
                            <td>{{ $auto['fotografia'] ?? '' }}</td>
                            <td> {{ $auto['ruta'] ?? '' }}</td>
                            <td  >
                            <div   style="display:inline-block; min-width: max-content">
                                <a class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">Edit</a>

                                {{-- <button  type="button" class="btn btn-outline-primary btn-sm fa fa-edit"
                                    data-bs-toggle="modal" data-bs-target="#editModal">Edit</button> --}}
                                {{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-lg">modal-lg</button> --}}
                                <button type="button" class="btn btn-danger btn-sm fa fa-remove"></button>
                            </div>

                            </td>
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
        <table>
            <tbody>
                <tr>
                    <th>País</th>
                    <th>Capital</th>
                    <th>Superficie</th>
                    <th>Habitantes</th>
                </tr>
                <tr>
                    <td>España</td>
                    <td>Madrid</td>
                    <td>504.645 km<sup>2</sup></td>
                    <td>46,6 M</td>
                </tr>
            </tbody>
        </table>


    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModalCenter">
        Inside modal scrollable
    </button>

    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal2">
        btn2
    </button>

    <x-modal id="exampleModalCenter" >
    <x-slot name="body">
          @include('livewire.registro.formedit')
    </x-slot>
    </x-modal>

    <x-modal id="modal2">
        <x-slot name="body">
            hola desde modal 2

            <button>foo</button>
        </x-slot>
    </x-modal>
</div>

<style>

        .headt td {
        min-width: 500px;
        height: 1000px;
        background-color: red;
        }

        table {
        color: green;
        }
        table td:first-child {
            width: 200px;
            }
            table td:nth-child(2) {
            width: 100px;
            }
            table td:nth-child(3) {
            width: 600px;
            }
            table td:last-child {
            width: 150px;
             
            }
</style>

