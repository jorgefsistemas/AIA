@extends('adminlte::page')
@section('title', 'SEMOVI')

@section('content_header')
    <h1 style="font-size: 30pt"><b>Bienvenido</b></h1>
@stop

@section('content')
    <div class="container">
        <x-flash></x-flash>
    </div>
    <div class="row">
        <div class="col-12 text-center align-content-center">
        </div>
    </div><br>
    <h3 class="text-center">Registro de Automoviles</h3>

@stop

@section('footer')
    <div class="d-flex justify-content-between">
        <div class="" style="font-weight: bold;">Todo en Subastas</div>
        <div class="">Todo en Subastas .2022 &copy;</div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
