@extends('adminlte::page')
@section('title', '*')

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
     <div x-data="{ show: false }">
        <button @click="show = !show">Show</button>
        <h1 x-show="show">Alpine Js is working !</h1>
    </div>

@stop

@section('footer')
    <div class="d-flex justify-content-between">
        <div class="" style="font-weight: bold;">*</div>|
        <div class="">* .2022 &copy;</div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
