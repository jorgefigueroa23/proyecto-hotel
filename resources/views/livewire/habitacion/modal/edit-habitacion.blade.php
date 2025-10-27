<div>
    <div wire:ignore.self class="modal fade bd-example-modal-xl" id="habitacionEdit" tabindex="-1" role="dialog" aria-labelledby="habitacionEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">MODIFICAR DATOS DE LA HABITACIÓN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form wire:submit.prevent="updateHabitacion({{ $idHabitacion }})">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">

                                <!-- Número de Habitación -->
                                <div class="col-md-3">
                                    <label>NÚMERO HABITACIÓN</label>
                                    <x-adminlte-input 
                                        type="text" 
                                        required 
                                        wire:model="numeroHabitacion" 
                                        name="numeroHabitacion" 
                                        id="numeroHabitacion" 
                                        autocomplete="off" 
                                        placeholder="Ej: 101"
                                        label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-door-open text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>  
                                </div>

                                <!-- Tipo de Habitación -->
                                <div class="col-md-4">
                                    <label>TIPO DE HABITACIÓN</label>
                                    <x-adminlte-select 
                                        required 
                                        wire:model="tipoHabitacion" 
                                        name="tipoHabitacion" 
                                        id="tipoHabitacion" 
                                        label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-bed text-dark"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione</option>
                                        <option value="simple">Simple</option>
                                        <option value="doble">Doble</option>
                                        <option value="suite">Suite</option>
                                    </x-adminlte-select>
                                </div>

                                <!-- Precio -->
                                <div class="col-md-3">
                                    <label>PRECIO (S/)</label>
                                    <x-adminlte-input 
                                        type="number" 
                                        step="0.01" 
                                        required 
                                        wire:model="precioHabitacion" 
                                        name="precioHabitacion" 
                                        id="precioHabitacion" 
                                        placeholder="Ej: 120.00"
                                        label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-dollar-sign text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>

                                <!-- Estado -->
                                <div class="col-md-2">
                                    <label>ESTADO</label>
                                    <x-adminlte-select 
                                        required 
                                        wire:model="estadoHabitacion" 
                                        name="estadoHabitacion" 
                                        id="estadoHabitacion" 
                                        label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-toggle-on text-dark"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione</option>
                                        <option value="disponible">Disponible</option>
                                        <option value="ocupada">Ocupada</option>
                                        <option value="mantenimiento">Mantenimiento</option>
                                    </x-adminlte-select>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <!-- Piso o Sección -->
                                <div class="col-md-4">
                                    <label>PISO / SECCIÓN</label>
                                    <x-adminlte-select 
                                        required 
                                        wire:model="seccionId" 
                                        name="seccionId" 
                                        id="seccionId" 
                                        label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-layer-group text-dark"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">Seleccione</option>
                                        @foreach ($secciones as $seccion)
                                            <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>
                                        @endforeach
                                    </x-adminlte-select>
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-8">
                                    <label>DESCRIPCIÓN</label>
                                    <x-adminlte-textarea 
                                        wire:model="descripcionHabitacion" 
                                        name="descripcionHabitacion" 
                                        placeholder="Ej: Habitación remodelada, incluye aire acondicionado y TV."
                                        label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-info-circle text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>