@extends('layouts.passwordLayout')
@section('content_header')
<title>error 403</title>

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
    <p class="text-muted font-weight-bold" style="font-size: 1000%">403</p>
    <p class="display-4 text-muted">No cuenta con permisos para este módulo, favor de verificar</p>


    <a href="{{ url('/') }}" class="btn btn-outline-success ">Volver a inicio</a>

</div>
@endsection
