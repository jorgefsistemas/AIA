<div>
   <br><h4>Detalle de Movimientos de Busqueda Cancelaciones</h4>
    <div class="panel">
        <div class="row">
            <div class="col-md-12 bg-white" style="padding: 15px;">
                <table id="mostrar_registros_tramites" class="table table-responsive-lg table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FOLIO</th>
                            <th scope="col">PLACA</th>
                            <th scope="col">USUARIO</th>
                            <th scope="col">FECHA DE CAPTURA</th>
                            <th scope="col">FECHA DE ACTUALIZACION</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($placa['data'] as $key => $tramite) --}}
                        @foreach ($cancelaciones as $key => $tramite)
                            <tr>
                                <td>{{ $tramite['id'] ?? '' }}</td>
                                <td>{{ $tramite['oficio'] ?? '' }}</td>
                                <td>{{ $tramite['placa'] ?? '' }}</td>
                                <td>{{ $tramite['user_id'] ?? '' }}</td>
                                <td>{{ $tramite['created_at']}}</td>
                                <td>{{ $tramite['updated_at']}}</td>
                                <td>
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
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'print', {
            //         extend: 'pdfHtml5',
            //         text: 'PDF',
            //         orientation: 'landscape', //portrait
            //         pageSize: 'A4',
            //         exportOptions: {
            //             modifier: {
            //                 page: 'all',
            //             }
            //         }
            //     }
            // ]
        });
    </script>
@stop
