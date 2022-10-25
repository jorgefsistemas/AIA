@extends('layouts.passwordLayout')
@section('content_header')
<title>error 419</title>

@section('content')
<div class="container" style="margin-top: 10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h1 class="text-green text-center">
                    <strong>*</strong>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <p class="text-muted font-weight-bold" style="font-size: 1000%">419</p>
    <p class="display-4 text-muted">Página caducada</p>


    <a href="{{ url('/') }}" class="btn btn-outline-success ">volver al Inicio</a>

</div>
@endsection
