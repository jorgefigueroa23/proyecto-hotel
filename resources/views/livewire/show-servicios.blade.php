<div>
    <x-adminlte-card title="SERVICIOS QUE BRINDA EL CEMENTERIO MUNICIPAL" class="m-2" theme="dark" icon="fas fa-id-card">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 ">
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#servicioAdd">
                                            <i class="fas fa-plus-square"></i> Registrar Servicio
                                        </a>
                                        <br>
                                        <br>

                                    <livewire:service-table theme="bootstrap-4" />
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-adminlte-card>
    
    <div wire:ignore.self class="modal fade" id="servicioAdd">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">AGREGAR NUEVO SERVICIO</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="servicioCreate()">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>DESCRIPCION SERVICIO</label>
                                        <x-adminlte-input wire:model="descripcion" type="text" name="descripcion" id="descripcion" autocomplete="off" placeholder="Ingrese nombre" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>MONTO</label>                                       
                                        <x-adminlte-input wire:model="monto" type="text" name="monto" id="monto" autocomplete="off" placeholder="Ingrese monto" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>RESOLUCIÓN</label>                                       
                                        <x-adminlte-input wire:model="resolucion" type="text" name="resolucion" id="resolucion" autocomplete="off" placeholder="Ingrese resolución" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="guardarCambios">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div wire:ignore.self class="modal fade" id="servicioEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ACTUALIZACIÓN DE SERVICIO</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="servicioUpdate({{$this->servicioId}})">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>DESCRIPCION SERVICIO</label>
                                        <x-adminlte-input wire:model="descripcionEdit" type="text" required name="descripcionEdit" id="descripcionEdit" autocomplete="off" placeholder="Ingrese nombre" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>MONTO</label>                                       
                                        <x-adminlte-input wire:model="montoEdit" type="text" required name="montoEdit" id="montoEdit" autocomplete="off" placeholder="Ingrese monto" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>RESOLUCIÓN</label>                                       
                                        <x-adminlte-input wire:model="resolucionEdit" type="text" required name="resolucionEdit" id="resolucionEdit" autocomplete="off" placeholder="Ingrese resolución" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="guardarCambios">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>