<div>
    <x-adminlte-card title="USUARIOS" class="m-2" theme="dark" icon="fas fa-id-card">
        <div class="col-12">                                         
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
                                        <i class="fas fa-plus-square"></i> Registrar Usuario
                                    </a>
                                    <br>
                                    <br>
                                
                                    <!-- * Options: tailwind | bootstrap-4 | bootstrap-5. -->
                                    <livewire:user-table theme="bootstrap-4"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-adminlte-card>

    <div wire:ignore.self class="modal fade show" name="editUser" id="editUser" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">EDITANDO USUARIO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form wire:submit.prevent="updateUser({{ $userId }})">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- Nombre y Apellido --}}
                                            <label>NOMBRES Y APELLIDOS <strong style="color:red">*</strong></label>
                                            <x-adminlte-input wire:model="nombre" type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" label-class="text-lightblue">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                            @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- USERNAME --}}
                                            <label>NOMBRE DE USUARIO <strong style="color:red">*</strong></label>
                                            <x-adminlte-input wire:model="username" type="text" name="username" id="username" placeholder="Ingrese nombre de usuario" readonly="readonly" label-class="text-lightblue">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- Correo --}}
                                            <label>CORREO <strong style="color:red">*</strong></label>
                                            <x-adminlte-input wire:model="email" type="text" name="email" id="email" placeholder="Ingrese Giro" label-class="text-lightblue">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- DNI --}}
                                            <label>DOC. NAC. IDENTIDAD <strong style="color:red">*</strong></label>
                                            <x-adminlte-input wire:model="numdoc" type="text" name="numdoc" id="numdoc" placeholder="Ingrese dni" readonly="readonly" label-class="text-lightblue">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-user text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                            @error('numdoc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- ROL --}}
                                            <label>ROL <strong style="color:red">*</strong></label>
                                            <x-adminlte-select wire:model="rol" value="{{ $rol }}" name="rol" id="rol" label-class="text-lightblue">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-id-card text-dark"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="user">USUARIO</option>
                                                <option value="admin">ADMINISTRADOR</option>
                                            </x-adminlte-select>
                                            @error('rol')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- ESTADO --}}
                                            <label>ESTADO <strong style="color:red">*</strong></label>
                                            <x-adminlte-select wire:model="estadoUser" value="{{ $estadoUser }}" name="estadoUser" id="estadoUser" label-class="text-lightblue">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-id-card text-dark"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="1">HABILITADO</option>
                                                <option value="0">DESHABILITADO</option>
                                            </x-adminlte-select>
                                            @error('estadoUser')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
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
