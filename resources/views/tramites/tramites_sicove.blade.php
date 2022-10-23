<div>
   <br><h4>Detalle de Movimientos</h4>
    <div class="panel">
        <div class="row">
            <div class="col-md-12 bg-white" style="padding: 15px;">
                <table id="mostrar_registros_tramites" class="table table-responsive-lg table-striped" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th scope="col">LINEA DE CAPTURA</th> --}}
                            <th scope="col">Folio</th>
                            <th scope="col">Placa</th>
                            {{-- <th scope="col">USUARIO</th> --}}
                            {{-- <th scope="col">TRAMITE</th> --}}
                            <th scope="col">Desc. movimiento</th>
                            <th scope="col">Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cancelaciones['data'] as $key => $tramite)
                            <tr>
                                {{-- <td>{{ $tramite['linea_captura'] ?? '' }}</td> --}}
                                <td>{{ $oficio ?? '' }}</td>
                                <td>{{ $tramite['placa'] ?? '' }}</td>
                                {{-- <td>{{auth()->user()->id}}</td> --}}
                                {{-- <td>{{$tramite['tramite'] ?? '' }}</td> --}}
                                <td>{{$tramite['tipo_movimiento'] ?? '' }}</td>
                                <td>
                                    <button type="sumbit" class="btn btn-lg btn-success" wire:click="cancelar_movimiento({{$key}})" wire:loading.remove>Cancelar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $('#mostrar_registros_tramite').DataTable({
            ordering: null,
            info: null,
            "pageLength": 10,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    </script>
@stop
