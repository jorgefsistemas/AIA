@extends('layouts.passwordLayout')
@section('content_header')
<title>error 404</title>

@section('content')
<div class="container" style="margin-top: 10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h1 class="text-green text-center">
                    <strong>Todo en Subastas</strong>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <p class="text-muted font-weight-bold" style="font-size: 1000%">404</p>
    <p class="display-4 text-muted">No se encontró la página</p>


    <a href="{{ url('/') }}" class="btn btn-outline-success ">Volver a inicio</a>

</div>
@endsection
