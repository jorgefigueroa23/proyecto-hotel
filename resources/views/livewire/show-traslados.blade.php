<div>
    <x-adminlte-card title="TABLA TRASLADOS" class="m-2" theme="dark" icon="fas fa-id-card">
        <div class="col-12">                                         
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <br>
                                    <table id="tabla_traslados" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                        <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                            <tr >
                                                <th>N°</th>
                                                <th>TIPO DE TRASLADO</th>
                                                <th>CEMENTERIO</th>
                                                <th>PABELLON ANT.</th>
                                                <th>UBICACION ANT.</th>
                                                <th>PABELLON</th>
                                                <th>UBICACION</th>
                                                <th>ACTA DEFUNCION</th>
                                            </tr>
                                        </thead>
                                        <tbody class="">
                                            @php $i = 1 @endphp
                                            @foreach ($traslados as $traslado)
                                                <tr class="text-center">
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $traslado->tipo_traslado }}</td>
                                                    <td>{{ $traslado->cementerio }}</td>
                                                    <td>{{ $traslado->nombre_pabellon_anterior_traslado }}</td>
                                                    <td>{{ $traslado->ubicacion_anterior_traslado }}</td>
                                                    <td>{{ $traslado->nombre_pabellon_traslado }}</td>
                                                    <?php $letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G']; ?>
                                                    <td>{{ $traslado->ubicacion_pabellon_traslado }}</td>
                                                    @if(strlen($traslado->acta_defuncion_traslado) > 10)
                                                    <td>
                                                        <i class="far fa-check-circle" style="color:green;"></i>
                                                    </td>
                                                    @else
                                                    <td>
                                                        <i class="far fa-times-circle" style="color:red;"></i>
                                                    </td>
                                                    @endif
                                                </tr>
                                            @php $i++ @endphp
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
