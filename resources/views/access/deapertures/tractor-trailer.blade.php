@extends('adminlte::page')

@section('title', 'Deapertures | Tractor-Trailers')

@section('content_header')
    <h1>Deapertures Tractor & Trailers</h1>
@stop

@section('content')
    <div class="container">
        @livewire('access.departures.tractor-traila')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
