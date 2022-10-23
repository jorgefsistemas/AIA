<html>
<head>
    <title>Sabana de datos de cancelación {{$datos['placa']}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <style>
        body{
            font-family: "Helvetica Neue", sans-serif;
            font-size: 12px;


        }
        .img_header {
            position: fixed;
            left: 20%;
            height: 70px;
            top: -34px;
        }

        table tbody tr td{
            padding: 6px 3px;
            width: 50%;
        }
        .fod{
            position: fixed;
            bottom: 5px;
            padding: 0;
            margin: 0;
            font-size: 7px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center bottom;
            background-image: url("images/semovi/footer.png");
            /* background-image: src="images/semovi/footer.png"; */
        }
        .footter{
            position: fixed;
            left: -2%;
            height: 50px;
            bottom: -30px;
        }

        .titulo{
            font-weight: bold;
            color:white;
            font-size: 12px;
            height: 20px;
        }
        .bordetabla{
            padding: 15px;
            border-radius: 15px;
        }
        .bodycontainer{
            /* position: fixed; */
            position: relative;
            align-self: center;
            top: 60px;
        }
        .cabezera{
            /* position: fixed; */

            position: relative;
            align-self: center;

            /* align-self: center; */

        }
        .contiene-tabla{
            border:1px solid #646464;
            border-radius: 15px;
            background-color: white;
        }
        .img_qr{
            position: fixed;
            right: 19%;
            height: 75px;
            bottom: 50px;
        }
        .cont_titulo{
            margin: 5px;
            background: #721422;
            border-radius: 5px;
        }
        .subtitulo{
            /* position: absolute;
            left: 50%;
            transform: translate(-50%, -50%); */
            position: fixed;
            left:25%;
            top: 36px;
            width: 50%;
            font-size: 14px;
            color:#721422;
            padding: 2px;
            text-align: center;
            border: 3px solid #721422;
            border-radius: 10px;
        }
        .leyenda{
            font-size: 12px;
            position: fixed;
            color: grey;
            bottom: 5%;
        }
        p {
  text-align: center;
}
    </style>
</head>
<body>
<header>
    <div center="center" >
        {{-- <img class="img_header" src="images/semovi/banner.png" alt=""> --}}
        <p class="subtitulo" >SABANA DE DATOS <b>CANCELACIONES</b></p>
    </div>

</header>
<div class="bodycontainer">

    <div class="panel-body" >
        <div class="col-md-6 col-lg-offset-3 text-left">
            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL PROPIETARIO</span>
            </div>
            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{($datos['razon_social']=='')?$datos['nombre'].' '.$datos['paterno'].' '.$datos['materno']:$datos['razon_social']}}</span></td>
                        <td class=""><b>Genero: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['sexo']}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>CURP/RFC: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949">
                                {{$datos['curp']}}
                            @if($datos['razon_social'] != null)
                                    {{$datos['rfc']}}
                            @endif
                            </span>
                        </td>
                        <td style=""><b>Teléfono: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['telefono']}}</span></td>

                    </tr>
                    <tr>
                        <td class=""><b>Codigo Postal: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['cp']}}</span></td>
                        <td class=""><b>Entidad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['entidad_federativa']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Calle: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['calle']}}</span></td>
                        <td class=""><b>Alcaldía: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['alcaldia']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Colonia: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['colonia']}}</span></td>
                        @if($datos['interior'])
                                <td class=""><b>Nro.Ext: &nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['exterior']}}</span>&nbsp;&nbsp;&nbsp;<b>Nro.Int:&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['interior']}}</span></td>
                            @else
                                <td class=""><b>Nro.Ext:: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['exterior']}}</span></td>
                        @endif
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL VEHÍCULO</span>
            </div>

            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>NIV: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949;font-size: 16px;font-weight: bold; font-style: oblique"> {{$datos['serie_vh']}}</span></td>
                        <td class=""><b>REPUVE: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['repuve']}}</span></td>
                    </tr>
                    <tr>
                        <td style=""><b>Número de Motor: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['numero_motor']}}</span></td>
                        <td class=""><b>Valor Factura: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949">  ${{$datos['importe_factura']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Cilindros: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['cilindros']}}</span></td>
                        <td class=""><b>Tipo de combustible: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['combustible']}}</span></td>
                    </tr>
                    <tr>
                        <td class=""><b>Uso: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['uso']}}</span></td>
                        <td class=""><b> Póliza de Seguro: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['folio_poliza']}}</span></td>

                    </tr>
                    <tr>
                        <td style=""><b>Clave Vehicular: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['clave_vehicular']}}</span></td>
                        <td style=""><b>Tipo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['clave_tipo']}}</span></td>

                    </tr>
                    <tr>
                        <td style=""><b>Marca:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><span style="color: #4b4949">{{$datos['marca_empresa']==''?$datos['marca_real']:$datos['marca_empresa']}}</span></td>
                        <td style=""><b>Clase: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['clave_clase']??'NO REGISTRADA'}}</span></td>

                    </tr>
                    <tr>
                        <td style=""><b>Línea/modelo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['linea_modelo']==''?$datos['linea_real']:$datos['linea_modelo']}}</span></td>
                        <td class=""><b>Puertas:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #4b4949"> {{$datos['puertas']}}</span></b></td>

                    </tr>
                    <tr>
                        <td class=""><b>Modelo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['modelo']??'NO REGISTRADA'}}</span></td>
                        <td class=""><b>Pasajeros: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['pasajeros']}}</span></td>

                    </tr>
                    <tr>
                        <td colspan="2"><b>Version: &nbsp;</b><span style="color: #4b4949"> {{$datos['ver_version']}}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center cont_titulo">
                <span class="titulo">DATOS DEL TRÁMITE</span>
            </div>
            <div class="contiene-tabla">
                <table class=" bordetabla" style="width: 100%">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <td class=""><b>Placa: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949; font-size: 16px;font-weight: bold;font-style: oblique"> {{$datos['placa']}}</span></td>
                        <td class=""><b>Oficio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['observacion_modificacion']}}</span></td>
                        {{-- <td class=""><b>Placa Anterior: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['placa_anterior']}}</span></td> --}}

                    </tr>
                    {{-- <tr>
                        <td class="">
                            <b>Folio Lógico TC: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['folio_logico_tc']}}</span>

                        </td>
                        <td class=""><b>Fecha Alta del Vehículo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{Str::limit($datos['vehiculo_created_at'],10, '')}}</span></td>

                    </tr>--}}
                    <tr>
                        <td class=""><b>Tipo de Movimiento: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['tipo_movimiento']}}</span></td>
                        <td class=""><b>Operador que Canceló: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$nucc}}</span></td>

                    </tr>
                    <tr>
                        {{-- <td class=""><b>Operador: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['operador']}}</span></td> --}}

                    </tr>
                    <tr>
                        {{-- <td class=""><b>Curp Solicitante: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['curp']}}</span></td>
                        <td class=""><b>Estatus Tramite: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><span style="color: #4b4949"> {{$datos['estatus']}}</span></td> --}}
                    </tr>
                    <tr>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div  style="text-align:center;">
                <table style="width: 100%">
                    <tr>
                        <th width="1"></th>
                        <th>EXPEDIDO CON FECHA:</th>
                        <td style="color: #4b4949">{{date('Y-m-d H:i:s')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<div class="fod" >
    <hr>
    <p class="leyenda"> Dirección de Sistemas de Información, Secretaría de Movilidad Ciudad de México 2021 &copy;</p>

     {{-- <img src="images/semovi/footer.png" alt=""> --}}
     <p style="z-index: 7">"Con fundamento en el artículo 11 de la Ley de Protección de Datos Personales para el Distrito Federal,
        la información contenida en este documento no es oficial hasta que se confirme por escrito con
        la firma autógrafa del Servidor Público facultado, por lo que la información contenida en el mismo no es oficial de la
        Secretaría de Movilidad hasta que se encuentre debidamente firmado en original.Este documento es confidencial, dirigido
        para uso exclusivo del destinatario, quedando prohibida su distribución y/o difusión en cualquier modalidad sin
        previa autorización del Servidor Público que lo emite y coteja en los expedientes físicos del área que la detenta.</p>
</div>
</body>
</div>
</html>
