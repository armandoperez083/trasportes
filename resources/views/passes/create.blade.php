@extends('adminlte::page')

@section('title', 'Exit Pass')

@section('content_header')
    <h1>Pase de Salida</h1>

    <div class="conteiner">
        <div class="col-md-6">
            @if ($errors->any())
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        </div>
    </div>


@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">

                {!! Form::open(['route' => 'admin.passes.store']) !!}
                @method('post')
                <h5 class="">Tractor</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Numero</label>
                                    <select id="tractorID" class="form-select col-md-7" name="tractor_id"
                                        style="width: 100%">
                                        <option></option>
                                        @foreach ($tractors as $tractor)
                                            <option value="{{ $tractor->id }}">{{ $tractor->number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="driver">Nombre del Chofer</label>
                                    <input id="driver" class="form-control" type="text" name="driver">
                                    @error('driver')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group ">
                                    <label for="my-select">Con Caja</label>
                                    <select id="con-caja" class="form-control" name="trailer">
                                        <option>no</option>
                                        <option>yes</option>
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
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="driver">Numero</label>
                                        <select id="trailerID" class="form-select col-md-7" name="trailer_id"
                                            style="width: 100%">
                                            <option></option>
                                            @foreach ($trailers as $trailer)
                                                <option value="{{ $trailer->id }}">{{ $trailer->number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="my-select">Vacia</label>
                                        <select id="empty" class="form-control" name="empty">
                                            <option>no</option>
                                            <option>yes</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Numero de sello</label>
                                        <input id="sello" class="form-control" type="text" name="seal_number">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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

            $("#tractorID").select2({
                placeholder: "Selecciona...",
                allowClear: true
            });

            $("#trailerID").select2({
                placeholder: "Selecciona...",
                allowClear: true
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
