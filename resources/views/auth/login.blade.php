@extends('adminlte::auth.login')
@section('css')
    <style>
        body  {
            background-image: url('images/vocho.jpg');
            {{-- background-image: url('images/subastalo.png') !important; --}}
            background-repeat: no-repeat !important;
            background-size: cover !important;
            background-position: center !important;
            width: 100% !important;
        }
        .login-box{
            background: white;
            border-radius: 10px;
            opacity: 0.9;
        }
        .card-primary.card-outline {
            border-top: 3px solid #ab8d5d;
            box-shadow: none;
        }
    </style>
@stop
