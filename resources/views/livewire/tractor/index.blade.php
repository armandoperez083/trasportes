<div>
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lista de tractors</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 500px;">
                        <input wire:model="search" type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                @if ($tractors->count())
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
                            @foreach ($tractors as $tractor)
                                <tr>
                                    <td>{{ $tractor->id }} </td>
                                    <td>{{ $tractor->number }}</td>
                                    <td>{{ $tractor->license_plate }}</td>
                                    <td>{{ $tractor->company->name }}</td>
                                     @if ($tractor->status == 'entrance')
                                     <td><span class="badge bg-success">{{ $tractor->status }}</span></td>

                                     @elseif ($tractor->status == 'pass')
                                     <td><span class="badge bg-warning">{{ $tractor->status }}</span></td>
                                     @else
                                     <td><span class="badge bg-danger">{{ $tractor->status }}</span></td>

                                     @endif
                                    <td>{{ $tractor->created_at }}</td>
                                    <td>{{ $tractor->updated_at }}</td>
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
