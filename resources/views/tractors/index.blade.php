@extends('adminlte::page')

@section('title', 'Tractors')

@section('content_header')
    <h1>Tractors</h1>
@stop

@section('content')
<div class="container">
    @livewire('tractor.index')
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
