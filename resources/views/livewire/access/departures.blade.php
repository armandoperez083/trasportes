<div>
    <div class="container">
        @if (session('status'))
            <x-adminlte-alert theme="danger" title="Danger">
                {{ session('status') }}
            </x-adminlte-alert>
        @endif
    </div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
                <h5 class="">Tractor</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="my-input">Numero de Tractor</label>
                                    <input wire:model="number_tractor" id="number" class="form-control "
                                        value="{{ old('number_tractor') }}" type="text" name="number_tractor">
                                    @error('number_tractor')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="driver">Nombre del Chofer</label>
                                    <input id="driver" readonly class="form-control"
                                        value="{{ $pass->driver ?? '' }}" type="text" name="driver">
                                    @error('driver')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="license_plate_tractor">Placa</label>
                                    <input id="" wire:model.defer="license_plate_tractor" class="form-control "
                                        value="{{ old('license_plate_tractor') }}" type="text"
                                        name="license_plate_tractor">
                                    @error('license_plate_tractor')
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div x-data="{ open: @entangle('open') }">
                    <div class="col-md-2" x-data="{ open: true }">
                        <div class="form-group ">
                            <label for="my-select">Con Caja</label>
                            <select id="con-caja" wire:model="trailer" class="form-control" name="trailer">
                                <option>no</option>
                                <option>yes</option>
                            </select>
                        </div>
                    </div>
                    <div id="trailer" x-show="open">
                        <h5>Trailer</h5>
                        <div class="card">
                            <div class="card-body">
                                <div x-show="open" class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="my-input">Numero de Caja</label>
                                            <input id="numberT" wire:model="number_trailer" class="form-control "
                                                value="{{ old('number_trailer') }}" type="text" name="number_trailer">
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
                                            <input id="sello" class="form-control " value="{{ old('seal_number') }}"
                                                type="text" name="seal_number">
                                        </div>
                                        @error('seal_number')
                                            <label class="text-danger">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="my-input">Numero de Placa</label>
                                            <input id="license_plateT" class="form-control "
                                                value="{{ old('license_plate_trailer') }}" type="text"
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
                </div>



            </form>

        </div>

    </div>

    <script>
        // console.log("Prueba");
        document.addEventListener('livewire:load', () => {

            $('#select2').select2();

            $('#select2').on('change', function() {
                @this.set('pass', this.value);
            });


            $("form").keypress(function(e) {
                if (e.which == 13) {
                    return false;
                }
            });






            // function disabled() {
            //     $("#type").attr('disabled', 'disabled');
            //     $("#license_plateT").attr('disabled', 'disabled');
            //     $("#caja").attr('disabled', 'disabled');
            //     $("#numberT").attr('disabled', 'disabled');
            //     $("#sello").attr('disabled', 'disabled');
            //     $("#trailer").hide();
            // }

            // function enabled() {
            //     $("#type").removeAttr('disabled');
            //     $("#license_plateT").removeAttr('disabled');
            //     $("#caja").removeAttr('disabled');
            //     $("#numberT").removeAttr('disabled');
            // }

            // disabled()

            // $("#con-caja").change(function() {

            //     if ($("#con-caja").val() == 'yes') {
            //         $("#trailer").show();
            //         $("#empty").val("yes")
            //         enabled()


            //     } else {
            //         $("#trailer").hide();
            //         disabled()

            //     }
            // })

            // $("#empty").change(function() {

            //     if ($("#empty").val() == 'no') {
            //         $("#sello").removeAttr('disabled');

            //     } else {
            //         $("#sello").attr('disabled', 'disabled');

            //     }
            // });



        });
    </script>
</div>
