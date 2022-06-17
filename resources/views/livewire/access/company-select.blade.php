<div>
    <div class="row">
        <div class="col">
            <select id="select2" class="form-select col-md-7" name="company_id" style="width: 100%">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="col">
            <x-jet-danger-button wire:click="$set('open', true)">
                Agregar
            </x-jet-danger-button>

        </div>

    </div>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Empresa
        </x-slot>

        <x-slot name="content">
            <div>
                <x-jet-label value="Nombre" />

                <x-jet-input type="text" class="form-control" wire:model.defer="name" />

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save">
                Agregar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        // console.log("Prueba");
        document.addEventListener('livewire:load', () => {

            window.initSelectStationDrop = () => {
                $('#select2').select2();
            }
            initSelectStationDrop();
            window.livewire.on('select2', () => {
                initSelectStationDrop();
            });

        });
    </script>

</div>
