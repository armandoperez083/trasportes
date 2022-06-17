@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Accesos de Entrada</h1>

    <div class="container-fluid">
        @if (session('status'))
            <x-adminlte-alert theme="danger" title="Danger">
                {{ session('status') }}
            </x-adminlte-alert>
        @endif
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-body">

                {!! Form::open(['route' => 'admin.access.entrances.store']) !!}
                @method('post')

                <h5 class="">Empresa</h5>
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        @livewire('access.company-select')
                    </div>
                </div>

                <h5 class="">Tractor</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="my-input">Numero de Tractor</label>
                                    <input id="number" class="form-control " value="{{ old('number_tractor') }}"
                                        type="text" name="number_tractor">
                                    @error('number_tractor')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="driver">Nombre del Chofer</label>
                                    <input id="driver" class="form-control" value="{{ old('driver') }}" type="text" name="driver" >
                                    @error('driver')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="license_plate">Placa</label>
                                    <input id="" class="form-control " value="{{ old('license_plate_tractor') }}" type="text" name="license_plate_tractor">
                                    @error('license_plate_tractor')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group ">
                                    <label for="my-select">Con Caja</label>
                                    <select id="con-caja" class="form-control"  name="trailer">
                                        <option >no</option>
                                        <option >yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div id="trailer">
                    <h5>Trailer</h5>
                    <div class="card">
                        <div class="card-body">
                            <div x-show="open" class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="my-input">Numero de Caja</label>
                                        <input id="numberT" class="form-control " value="{{ old('number_trailer') }}" type="text"
                                            name="number_trailer">
                                        @error('number_trailer')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="my-select">Vacia</label>
                                        <select id="empty" class="form-control " name="empty">
                                            <option>no</option>
                                            <option>yes</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Numero de sello</label>
                                        <input id="sello" class="form-control " value="{{ old('seal_number') }}" type="text" name="seal_number">
                                    </div>
                                    @error('seal_number')
                                    <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="my-input">Numero de Placa</label>
                                        <input id="license_plateT" class="form-control " value="{{ old('license_plate_trailer') }}" type="text"
                                            name="license_plate_trailer">
                                            @error('license_plate_trailer')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    @stop

    @section('js')
        <script>
            $(document).ready(function() {

                //Deshabilitar tecla enter de los formularios
                $("form").keypress(function(e) {
                    if (e.which == 13) {
                        return false;
                    }
                });

                function disabled() {
                    $("#type").attr('disabled', 'disabled');
                    $("#license_plateT").attr('disabled', 'disabled');
                    $("#caja").attr('disabled', 'disabled');
                    $("#numberT").attr('disabled', 'disabled');
                    $("#sello").attr('disabled', 'disabled');
                    $("#trailer").hide();
                }

                function enabled() {
                    $("#type").removeAttr('disabled');
                    $("#license_plateT").removeAttr('disabled');
                    $("#caja").removeAttr('disabled');
                    $("#numberT").removeAttr('disabled');
                }

                disabled()

                $("#con-caja").change(function() {

                    if ($("#con-caja").val() == 'yes') {
                        $("#trailer").show();
                        $("#empty").val("yes")
                        enabled()


                    } else {
                        $("#trailer").hide();
                        disabled()

                    }
                })

                $("#empty").change(function() {

                    if ($("#empty").val() == 'no') {
                        $("#sello").removeAttr('disabled');

                    } else {
                        $("#sello").attr('disabled', 'disabled');

                    }
                });

            });
        </script>

    @stop
