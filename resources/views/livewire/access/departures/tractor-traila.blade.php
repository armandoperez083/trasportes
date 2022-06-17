<div>
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
                        <div id="trailer" wire:ignore>
                            <h5>Trailer</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div x-show="open" class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="my-input">Numero de Caja</label>
                                                <input id="numberT" wire:model.defer="number_trailer" class="form-control "
                                                    value="{{ old('number_trailer') }}" type="text" name="number_trailer">
                                                @error('number_trailer')
                                                    <label class="text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="my-select">Vacia</label>
                                                <select  wire:model="empty" id="empty" class="form-control " name="empty">
                                                    <option>no</option>
                                                    <option>yes</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Numero de sello</label>
                                                <input id="sello" wire:model.defer="seal_number"  class="form-control " value="{{ old('seal_number') }}"
                                                    type="text" name="seal_number">
                                            </div>
                                            @error('seal_number')
                                                <label class="text-danger">{{ $message }}</label>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="my-input">Numero de Placa</label>
                                                <input id="license_plateT" wire:model.defer="license_plate_trailer" class="form-control "
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

                function disabled() {

                    $("#sello").attr('disabled', 'disabled');
                    $("#empty").val("yes")

                }

                disabled()

                $("#empty").change(function() {

                    if ($("#empty").val() == 'no') {
                        $("#sello").removeAttr('disabled');

                    } else {
                        $("#sello").attr('disabled', 'disabled');

                    }
                });



            });
        </script>
    </div>

</div>
