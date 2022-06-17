<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title col">Lista de Passes </h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm " style="width: 500px;">
                        <input wire:model="search" type="text" name="table_search" class="form-control float-right"
                            placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                @if ($passes->count())
                    <table class="table table-hover text-left text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Driver</th>
                                <th>Tractor Number</th>
                                <th>Trailer Number</th>
                                <th>Empty</th>
                                <th>Seal Number</th>
                                <th>Access Number</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passes as $pass)
                                <tr>
                                    <td>{{ $pass->id}} </td>
                                    <td>{{ $pass->driver }}</td>
                                    <td>{{ $pass->tractor->number }}</td>
                                    <td>{{ $pass->trailer->number ?? 'sin salida'}}</td>
                                    <td>{{ $pass->empty }}</td>
                                    <td>{{ $pass->seal_number ?? 'no'}}</td>
                                    <td><span class="badge bg-warning">{{ $pass->access_id ?? 'en espera'}}</span></td>
                                    <td>{{ $pass->user_id }}</td>
                                    @if ($pass->status == 'pending')
                                    <td><span class="badge bg-danger">{{ $pass->status}}</span></td>
                                    @else
                                    <td><span class="badge bg-success">{{ $pass->status}}</span></td>

                                    @endif
                                    <td>{{ $pass->created_at }}</td>
                                    <td>{{ $pass->updated_at }}</td>
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

</div>
