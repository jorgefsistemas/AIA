<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            margin-top: 20px;
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /* background-color: #2a0927;
            color: white; */
            text-align: center;
            line-height: 30px;
            display: block;

        }

        footer {
            span: 2em;
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            /* background-color: #2a0927; */
            /* color: white; */
            text-align: justify;
            line-height: 35px;
            font-size: 8px;
            line-height: 9px;
            margin: 20px;
        }
         .table tbody tr td {

            padding: 6px 3px;
            width: 50%;
        }


        .fod {
            position: fixed;
            bottom: 50px;
            padding: 0;
            margin: 0;
            font-size: 7px;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center bottom;
        }


        .titulo {
            font-weight: bold;
            color: white;
            font-size: 12px;
            height: 20px;
        }

        .bordetabla {
            padding: 15px;
            border-radius: 15px;
        }

        .bodycontainer {
            position: absolute;
            top: 60px;
        }

        .contiene-tabla {
            border: 1px solid #646464;
            border-radius: 15px;
            background-color: white;
            /* text-align: center; */
        }

        .img_qr {
            position: fixed;
            right: 19%;
            height: 75px;
            bottom: 50px;
        }

        .cont_titulo {
            margin: 5px;
            background: #3db820;
            border-radius: 5px;
        }

        .subtitulo {
            position: fixed;
            left: 18%;
            top: 40px;
            width: 50%;
            font-size: 14px;
            color: #3db820;
            padding: 2px;
            text-align: center;
            border: 3px solid #3db820;
            border-radius: 10px;
        }

        .leyenda {
            font-size: 12px;
            position: fixed;
            color: grey;
            bottom: 5%;
        }
    </style>
</head>


<body>

    <header>

    </header>

    <main>

        <br>









        {{-- <div class="contiene-tabla" style="margin: 0 0 0 50px;width: 100%;"> --}}
            <table style="width:100%">
                <tr>
                    <th colspan="3" class="contiene-tabla" style="text-align: center; margin: 0 0 0 0;width: 80%;">
                        <br><br>
                        CONSTANCIA DE PARTICIPACIÓN EN LA ESTRATEGIA DE DIAGNÓSTICO E IDENTIFICACIÓN DE TRANSPORTE ALTERNATIVO INDIVIDUAL DE PASAJEROS EN LA
ALCALDIA GUSTAVO A. MADERO
                        <br>
                    </th>
                    <th rowspan="4"   class="contiene-tabla" ><img
                        src="data:image/png;base64, {!! $tramite->qr !!}">
                    </th>
                </tr>

                <tr>

                    <th style=" text-size: smaller;  text-align: left; margin: 0 0 0 0; width: 350px;">PERSONA
                        PROPIETARIA DEL VEHÍCULO:</th>
                    <td  style="color: #4b4949; text-size: smaller; text-align: left; margin: 0 0 0 0; width: 350px;">
                        {{$tramite->ciudadano->fullName}}</td>
                </tr>

                <tr>


                    <th style="text-size: smaller; text-align: left; margin: 0 0 0 0;width: 100%;">NÚMERO
                        DE LA BASE QUE PERTENECE:</th>


                    <td style="color: #4b4949">
                                                {{str_pad($tramite->base->id,3,'0',STR_PAD_LEFT);}}
                </tr>
                <tr>


                    <th style="text-size: smaller; text-align: left; margin: 0 0 0 0">FECHA DE
                        REGISTRO: </th>
                    <td style="color: #4b4949"> {{date('d/m/Y',strtotime($tramite->created_at))}} </td>
                </tr>

            </table>
        <br><br>





        <H4 style="text-align: center; font-size: 18px;">CONSTANCIA DE PARTICIPACIÓN EN LA ESTRATEGIA DE DIAGNÓSTICO E IDENTIFICACIÓN DE
            TRANSPORTE ALTERNATIVO INDIVIDUAL DE PASAJEROS EN LA
            ALCALDIA GUSTAVO A. MADERO
        </H4>
        <div  style="text-align: center; font-size: 60px;">
            <strong> {{ $tramite->folioConstancia }} </strong></div>
        <H5 style="text-align: center">LA PRESENTE CONSTANCIA NO AUTORIZA LA PRESTACIÓN DEL SERVICIO DE TRANSPORTE
            PÚBLICO DE PASAJEROS</H5>
    </main>

    <footer>
        <p>LA PRESENTE CONSTANCIA NO ES UN DOCUMENTO OFICIAL QUE ACREDITE UNA AUTORIZACIÓN ADMINISTRATIVA PARA LA
            PRESTACIÓN DEL SERVICIO DE TRANSPORTE PÚBLICO DE PASAJEROS, LA CUAL NO AMPARA LA PRESTACIÓN DE DICHO
            SERVICIO Y NO PODRÁ SER UTILIZADA PARA OTRO FIN, ASÍ MISMO
            NO SERÁ VÁLIDA COMO PRUEBA FEHACIENTE ANTE NINGÚN TRIBUNAL DE JUSTICIA ADMINISTRATIVA.
            EL PRESENTE DOCUMENTO ES UNA CONSTANCIA DE PARTICIPACIÓN VOLUNTARIA PARA EL REGISTRO DE MOVILIDAD DE BARRIO,
            LO ANTERIOR CON FUNDAMENTO EN LOS ARTÍCULOS 14 PÁRRAFO SEGUNDO Y 16 PÁRRAFO PRIMERO, SEGUNDO, 122 APARTADO A
            FRACCIÓN V, DE LA CONSTITUCIÓN POLÍTICA DE
            LOS ESTADOS UNIDOS MEXICANOS; 16 FRACCIÓN XI, 36 FRACCIÒN III, XXIV DE LA LEY ORGÀNICA DEL PODER EJECUTIVO Y
            DE LA ADMINISTRACIÒN PÙBLICA DE LA CIUDAD DE MÈXICO, ART 1, 7 FRACCIONES I, II, III, IV, VII Y IX, 9
            FRACCIONES I, VI, XVII, XVIII, XXII, L, LVI, LX, LXI, LXVIII, LXVIII BIS, LXXII, LXXXVII,
            CII, CIII Y CIV,10 FRACCIÓN I, 12 FRACCIÓN VII, 55 FRACCIÓN I Y 56 FRACCIÓN I INCISO D, DE LA LEY DE
            MOVILIDAD DE LA CIUDAD DE MÉXICO; 1, 2 FRACCIONES II, V, VI, VIII Y XV, XVI, XXVII, 3, Y 4 DE LA LEY DE
            PROCEDIMIENTO ADMINISTRATIVO DE LA CIUDAD DE MÈXICO; 1, 2, 4, 7° INCISO XI, INCISO A NUMERAL
            2, 193 FRACCIONES I, XXII DEL REGLAMENTO INTERIOR DEL PODER EJECUTIVO Y DE LA ADMINISTRACIÓN PÚBLICA DE LA
            CIUDAD DE MÉXICO; Y LOS NUMERALES 1, 50 FRACCIONES I, II, III, IV, V, VI, VII, 51 FRACCIONES I, II, III, IV,
            V, 52 Y 53 EL REGLAMENTO DE LA LEY DE MOVILIDAD DEL DISTRITO FEDERAL.
            LA PRESENTE CONSTANCIA ES INTRANSFERIBLE, SU ÚNICO PROPÓSITO ES IDENTIFICAR QUÉ PERSONA Y UNIDAD PARTICIPÓ,
            EN EL REGISTRO DE MOVILIDAD DE BARRIO, POR LO CUAL NO CREA NI EXTINGUE NINGÚN TIPO DE DERECHO NI OBLIGACIÓN.
        </p>
    </footer>
</body>

</html>
