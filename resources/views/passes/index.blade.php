@extends('adminlte::page')

@section('title', 'Pases')

@section('content_header')
    <h1>Pases de Salida</h1>
@stop

@section('content')
    <div class="container">
        @livewire('passes.index-list')
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
