<h4>Domicilio</h4>
{{-- <hr> --}}
<div class="d-flex flex-wrap">
    <x-input id="calle" readonly required label="Calle">{{$placa['data'][0]['calle'] ?? ''}}
    </x-input>
    <x-input id="exterior" readonly required label="Número">{{$placa['data'][0]['exterior'] ?? ''}}
    </x-input>
    <x-input id="cp" readonly required label="Cp">{{$placa['data'][0]['cp'] ?? ''}}
    </x-input>
    <x-input id="colonia" readonly required label="Colonia">{{$placa['data'][0]['colonia'] ?? ''}}
    </x-input>
    <x-input id="alcaldia" readonly required label="Alcaldía">{{$placa['data'][0]['alcaldia'] ?? ''}}
    </x-input>
</div>
<h4>Propietario</h4>
<div class="d-flex flex-wrap">
    <x-input id="curp" readonly required label="Curp">{{$placa['data'][0]['curp'] ?? ''}}</x-input>
    <x-input id="nombre" readonly required label="Nombre">{{$placa['data'][0]['nombre'] ?? ''}}</x-input>
    <x-input id="paterno" readonly required label="Paterno">{{$placa['data'][0]['paterno'] ?? ''}}</x-input>
    <x-input id="materno" readonly required label="Materno">{{$placa['data'][0]['materno'] ?? ''}}</x-input>
</div>
<h4>Vehículo</h4>
<div class="d-flex flex-wrap">
    <x-input id="serie" readonly required label="Serie">{{$placa['data'][0]['serie_vh'] ?? ''}}</x-input>
    <x-input id="numero_motor" readonly required label="Número de motor">{{$placa['data'][0]['numero_motor'] ?? ''}}</x-input>
    <x-input id="clave_vehicular" readonly required label="Clave vehícular">{{$placa['data'][0]['clave_vehicular'] ?? ''}}</x-input>
    <x-input id="distribuidora" readonly required label="Marca">{{$placa['data'][0]['distribuidora'] ?? ''}}</x-input>
    <x-input id="linea_modelo" readonly required label="Línea">{{$placa['data'][0]['linea_modelo'] ?? ''}}</x-input>
    <x-input id="ver_version" readonly required label="Versión">{{$placa['data'][0]['ver_version'] ?? ''}}</x-input>
    <x-input id="placa_cancelada" readonly required label="Placa">{{$placa['data'][0]['placa'] ?? ''}}</x-input>
    <x-input id="modelo" readonly required label="Modelo">{{$placa['data'][0]['modelo'] ?? ''}}</x-input>
</div>

