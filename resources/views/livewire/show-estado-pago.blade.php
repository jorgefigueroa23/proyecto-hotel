<div>
    <x-adminlte-card title="TABLA ESTADOS DE PAGO" class="m-2" theme="dark" icon="fas fa-id-card">
        <div class="col-12">                                         
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br>
                                    <table id="tabla_estadoPago" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                        <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                            <tr >
                                                <th>ID</th>
                                                <th>DESCRIPCION</th>
                                                <th>EDITAR</th>
                                                <th>ELIMINAR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($estadoPagos as $estadoPago)
                                                <tr>
                                                    <td>{{ $estadoPago->id }}</td>
                                                    <td>{{ $estadoPago->descripcionPago }}</td>
                                                    <td>
                                                        <button wire:click="edit({{ $estadoPago->id }})" class="btn btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <button wire:click="destroy({{ $estadoPago->id }})" class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-adminlte-card>
</div>
