<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de accesss</h3>
            {{-- <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 500px;">
                    <input wire:model="search" type="text" name="table_search" class="form-control float-right"
                        placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>

        <div class="card-body table-responsive p-0">
            @if ($acceses->count())
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empresa</th>
                            <th>Conductor</th>
                            <th>Numero Tractor</th>
                            <th>Numero Trailer</th>
                            <th>Vacia</th>
                            <th>Numero de Sello</th>
                            <th>Registro</th>
                            <th>Status</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acceses as $access)
                            <tr>
                                <td>{{ $access->id ?? ''}} </td>
                                <td>{{ $access->company->name }}</td>
                                <td>{{ $access->driver }}</td>
                                <td>{{ $access->tractor->number }}</td>
                                <td>{{ $access->trailer->number ?? 'sin salida'}}</td>
                                <td>{{ $access->empty }}</td>
                                <td>{{ $access->seal_number ?? 'sin sello'}}</td>
                                <td>{{ $access->user->name }}</td>
                                @if ($access->status == 'entrance')
                                    <td><span class="badge bg-success">{{ $access->status}}</span></td>
                                @else
                                    <td><span class="badge bg-danger">{{ $access->status}}</span></td>
                                @endif
                                <td>{{ $access->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <p>No existe ningun registro</p>

                </div>
            @endif
        </div>

    </div>
</div>
