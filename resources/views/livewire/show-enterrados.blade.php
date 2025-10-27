<div>
    <x-adminlte-card title="TABLA DIFUNTOS" class="m-2" theme="dark" icon="fas fa-id-card">
        <div class="col-12">                                         
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br>
                                    <table id="tabla_enterrados" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                        <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                            <tr >
                                                <th>N°</th>
                                                <th>NOMBRE DEL DIFUNTO(A)</th>
                                                <th>PABELLON</th>
                                                <th>UBICACION</th>
                                                <th>F.F.</th>
                                                <th>F.E.</th>
                                                <!-- <th>EDITAR</th>
                                                <th>ELIMINAR</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            <?php $contador = 1; ?>
                                            @foreach ($enterrados as $enterrado)
                                                <tr class="text-center">
                                                    <td>{{ $contador }}</td>
                                                    <td>{{ $enterrado->nombre_difunto }}</td>
                                                    <td>{{ $enterrado->nombre}}</td> 
                                                        <?php $letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; ?>
                                                        <td>{{ $letras[$enterrado->letra-1] }}-{{ $enterrado->numero }}</td>
                                                    <td>{{ $enterrado->fecha_fallecimiento }}</td>
                                                    <td>{{ $enterrado->fecha_entierro }}</td>
                                                    <!-- <td>
                                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-enterrado" wire:click="edit({{ $enterrado->id }})"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-danger" wire:click="delete({{ $enterrado->id }})"><i class="fas fa-trash"></i></a>
                                                    </td> -->
                                                </tr>
                                                <?php $contador++; ?>
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

    <!-- Modal -->
</div>
