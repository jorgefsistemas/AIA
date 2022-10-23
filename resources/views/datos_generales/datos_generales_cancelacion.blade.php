<div>
@foreach ($cancelaciones as $tramite)
<h4>Domicilio</h4>
<hr>

<div class="d-flex flex-wrap">
    <x-input id="calle" readonly required label="Calle">{{$tramite['calle'] ?: ''}}
    </x-input>
    <x-input id="exterior" readonly required label="Número">{{$tramite['exterior'] ?: ''}}
    </x-input>
    <x-input id="cp" readonly required label="Cp">{{$tramite['cp'] ?: ''}}
    </x-input>
    <x-input id="colonia" readonly required label="Colonia">{{$tramite['colonia'] ?: ''}}
    </x-input>
    <x-input id="alcaldia" readonly required label="Alcaldía">{{$tramite['alcaldia'] ?: ''}}
    </x-input>
</div>

<h4>Propietario</h4>
<div class="d-flex flex-wrap">
    <x-input id="curp" readonly required label="Curp">{{$tramite['curp'] ?: ''}}</x-input>
    <x-input id="nombre" readonly required label="Nombre">{{$tramite['nombre'] ?: ''}}</x-input>
    <x-input id="paterno" readonly required label="Paterno">{{$tramite['paterno'] ?: ''}}</x-input>
    <x-input id="materno" readonly required label="Materno">{{$tramite['materno'] ?: ''}}</x-input>
</div>
<h4>Vehículo</h4>
<div class="d-flex flex-wrap">
    <x-input id="serie" readonly required label="Serie">{{$tramite['serie_vh'] ?: ''}}</x-input>
    <x-input id="numero_motor" readonly required label="Número de motor">{{$tramite['numero_motor'] ?: ''}}</x-input>
    <x-input id="clave_vehicular" readonly required label="Clave vehícular">{{$tramite['clave_vehicular'] ?: ''}}</x-input>
    <x-input id="distribuidora" readonly required label="Marca">{{$tramite['distribuidora'] ?: ''}}</x-input>
    <x-input id="linea_modelo" readonly required label="Línea">{{$tramite['linea_modelo'] ?: ''}}</x-input>
    <x-input id="ver_version" readonly required label="Versión">{{$tramite['ver_version'] ?: ''}}</x-input>
    <x-input id="placa_cancelada" readonly required label="Placa">{{$tramite['placa'] ?: ''}}</x-input>
    <x-input id="modelo" readonly required label="Modelo">{{$tramite['modelo'] ?: ''}}</x-input>
</div>
@endforeach
</div>
