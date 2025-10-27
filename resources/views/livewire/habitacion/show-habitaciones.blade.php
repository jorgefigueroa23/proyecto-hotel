<div>
    <x-adminlte-card title="HABITACIONES" class="m-2" theme="dark" icon="fas fa-bed">
        <div class="col-12">                                         
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div id="habitaciones_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- Botón para abrir modal de registro -->
                                    <a data-toggle="modal" data-target="#habitacionAdd" class="btn btn-primary">
                                        <i class="fas fa-plus-square"></i> Registrar Habitación
                                    </a>
                                    <br><br>

                                    <!-- Tabla de Habitaciones -->
                                    <livewire:habitaciones-table theme="bootstrap-4" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-adminlte-card>
    
    <!-- Modal para editar habitación -->
    <div wire:ignore.self class="modal fade bd-example-modal-xl" id="habitacionEdit" tabindex="-1" role="dialog" aria-labelledby="habitacionEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h4 class="modal-title">MODIFICAR DATOS DE LA HABITACIÓN</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form wire:submit.prevent="updateHabitacion({{ $idHabitacion }})">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <!-- Número -->
                                <div class="col-md-4">
                                    <label class="font-weight-bold">N° Habitación</label>
                                    <x-adminlte-input wire:model="numeroEdit" name="numeroEdit" type="text" placeholder="Ej: 101">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-door-open text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>

                                <!-- Tipo -->
                                <div class="col-md-4">
                                    <label class="font-weight-bold">Tipo</label>
                                    <x-adminlte-select wire:model="tipoEdit" name="tipoEdit">
                                        <option value="">Seleccione tipo</option>
                                        <option value="simple">Simple</option>
                                        <option value="doble">Doble</option>
                                        <option value="suite">Suite</option>
                                    </x-adminlte-select>
                                </div>

                                <!-- Precio -->
                                <div class="col-md-4">
                                    <label class="font-weight-bold">Precio (S/)</label>
                                    <x-adminlte-input wire:model="precioEdit" name="precioEdit" type="number" step="0.01" placeholder="Ej: 150.00">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-money-bill-wave text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Estado -->
                                <div class="col-md-4">
                                    <label class="font-weight-bold">Estado</label>
                                    <x-adminlte-select wire:model="estadoEdit" name="estadoEdit">
                                        <option value="">Seleccione estado</option>
                                        <option value="disponible">Disponible</option>
                                        <option value="ocupada">Ocupada</option>
                                        <option value="mantenimiento">Mantenimiento</option>
                                    </x-adminlte-select>
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-8">
                                    <label class="font-weight-bold">Descripción</label>
                                    <x-adminlte-textarea wire:model="descripcionEdit" name="descripcionEdit" placeholder="Detalles adicionales sobre la habitación..." rows=3>
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-align-left text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>