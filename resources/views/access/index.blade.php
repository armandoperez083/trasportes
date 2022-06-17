@extends('adminlte::page')

@section('title', 'Lista|Accesos')

@section('content_header')
    <h1>Lista de Acessos Regisrrados</h1>
@stop

@section('content')
<div class="container-fluid">
    @livewire('access.index')
</div>
@stop

@section('css')

@stop

@section('js')

@stop
