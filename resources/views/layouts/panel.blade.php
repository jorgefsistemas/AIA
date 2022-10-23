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
@yield('js')
@endsection

