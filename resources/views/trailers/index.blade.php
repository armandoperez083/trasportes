@extends('adminlte::page')

@section('title', 'Trailers')

@section('content_header')
    <h1>Trailers</h1>
@stop

@section('content')
    <div class="container">
        @livewire('trailers.index')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
