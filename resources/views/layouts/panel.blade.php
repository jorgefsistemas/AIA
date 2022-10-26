@extends('adminlte::page')

@section('title', 'Sistema')

{{-- @section('content_header')
    @yield('panel_content_header')
@stop --}}

@section('content')
    <div class="container">
        <x-flash></x-flash>
    </div>

    @yield('panel_content')
    {{-- @livewireScripts --}}
    @yield('scripts')
@stop

@section('footer')
    <div class="d-flex flex-wrap">
        {{-- <div class="mr-auto">
            {{ now() }}
        </div> --}}
        {{-- <div>
            {{ config('app.name') }}
        </div> --}}
    </div>
@stop

@section('js')
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'> --}}

<script type="text/javascript">

    $('.show_confirm_permission').click(function(event) {
        var id = event.target.id;
        var form = $(this).closest("form");
        var name = $(this).data("name");
        console.log(id);
        event.preventDefault();
        {{-- swal({
                title: `Seguro que desea eliminar este ` + id + `?`,
                text: "Favor de estar seguro de confirmar, los datos se perderan permanentemente.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            }); --}}
    });

            function soloNumeros(evt) {
            var code = (evt.which) ? evt.which : evt.keyCode;
            if (code == 8) { // backspace.
                return true;
            } else if ((code >= 48 && code <= 57)) { // is validate.
                return true;
            } else { // other keys.
                return false;
            }
        }



 

    function valideKeyDictamen(evt) {

        // code is the decimal ASCII representation of the pressed key.
        var code = (evt.which) ? evt.which : evt.keyCode;
      

        if (code == 8) { // backspace.
            return true;
        } else if ((code >= 48 && code <= 57) ||
            (code >= 65 && code <= 90) ||
            (code >= 97 && code <= 122) ||
            (code == 45 || code == 47)|| code == 32

        ) { // is validate.
            return true;
        } else { // other keys.
            return false;
        }
    }
</script>
@yield('js')
@endsection

