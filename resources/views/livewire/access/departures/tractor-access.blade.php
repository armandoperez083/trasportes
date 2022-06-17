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
                                    <input id="" wire:model="license_plate_tractor" class="form-control "
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
                <div class="card-footer">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                </div>
            </form>

        </div>

    </div>

    <script>
        // console.log("Prueba");
        document.addEventListener('livewire:load', () => {


        });
    </script>
</div>



