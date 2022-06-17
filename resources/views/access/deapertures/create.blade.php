@extends('adminlte::page')

@section('title', 'Acceso | Salida')

@section('content_header')
    <h1>Acceso de Salida</h1>


@stop

@section('content')
    <div class="container">
        {{-- @livewire('access.departures') --}}

        <h1>Selecciona el Tipo de Salida  </h1>
        <br>
          <div class="row align-items-center">
            <div class="col">
                <div class="card" style="width: 20rem;">
                    <img src="https://pngimg.com/uploads/truck/truck_PNG16254.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Tractor</h5>
                      <p class="card-text"></p>
                      <a href="{{ route('admin.access.deapertures.tractor') }}" class="btn btn-primary">Selecciona...</a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card" style="width: 33rem;">
                    <img src="https://pngimg.com/uploads/truck/truck_PNG16271.png" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Tractor & Traila </h5>
                      <p class="card-text"></p>
                      <a href="{{ route('admin.access.deapertures.tractor.trailer') }}" class="btn btn-primary">Selecciona...</a>
                    </div>
                  </div>
            </div>

          </div>
        {{-- <nav class="navbar bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="https://pngimg.com/uploads/truck/truck_PNG16254.png" alt="" width="350" height="200" class="d-inline-block align-text-top">

              </a>
              Tractor
              <a class="navbar-brand" href="#">
                <img src="https://pngimg.com/uploads/truck/truck_PNG16271.png" alt="" width="550" height="200" class="d-inline-block align-text-top">

              </a>
              Tractor & Traila

            </div>
          </nav> --}}
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {

            //Deshabilitar tecla enter de los formularios


        });
    </script>
@stop
