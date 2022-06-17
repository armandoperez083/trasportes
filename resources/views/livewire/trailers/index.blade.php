<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title col">Lista de Trailers</h3>
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
            @if ($trailers->count())
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Number</th>
                            <th>License Plate</th>
                            <th>Company</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trailers as $trailer)
                            <tr>
                                <td>{{ $trailer->id }} </td>
                                <td>{{ $trailer->number }}</td>
                                <td>{{ $trailer->license_plate }}</td>
                                <td>{{ $trailer->company->name }}</td>
                                @if ($trailer->status == 'entrance')

                                <td><span class="badge bg-success">{{ $trailer->status }}</span></td>

                                @elseif ($trailer->status == 'pass')
                                <td><span class="badge bg-warning">{{ $trailer->status }}</span></td>
                                @else
                                <td><span class="badge bg-danger">{{ $trailer->status }}</span></td>

                                @endif
                           <td>{{ $trailer->created_at }}</td>
                                <td>{{ $trailer->updated_at }}</td>
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
