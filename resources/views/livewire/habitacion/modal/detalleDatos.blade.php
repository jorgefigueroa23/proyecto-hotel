<div wire:ignore.self class="modal fade" id="Tumba3" style="display: none;" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DETALLE DEL NICHO <strong>{{ $datoLetra }}-{{ $datoNumero }}</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form wire:submit.prevent="updateTumba">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>TITULAR<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="datoTitular" type="text" value="{{ $datoTitular }}" name="datoTitular" id="datoTitular" autocomplete="off" placeholder="Ingrese nombre" label-class="text-lightblue"><!-- name="titularAdd" id="titularAdd" -->
                                    <!-- @error('datoTitular') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>DNI<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="datoDni" maxlength="8" minlength="8" type="text" value="{{ $datoDni }}" name="dniAdd" id="dniAdd" autocomplete="off" placeholder="Ingrese DNI" label-class="text-lightblue" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    <!-- @error('datoDni') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="far fa-id-card"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>CELULAR</label>
                                    <x-adminlte-input wire:model="datoCelular" maxlength="9" minlength="9" type="text" value="{{ $datoCelular }}" name="celularAdd" id="celularAdd" autocomplete="off" placeholder="Ingrese número" label-class="text-lightblue" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    <!-- @error('datoCelular') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-mobile"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>LETRA<strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" value="{{ $datoLetra }}" name="letraAdd" id="letraAdd" disabled="disabled" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-table"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>NUMERO<strong style="color:red">*</strong></label>
                                    <x-adminlte-input type="text" value="{{ $datoNumero }}" name="numeroAdd" id="numeroAdd" disabled="disabled" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-table"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>CODIGO ANTERIOR<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="oldCodigo" type="text" value="{{ $oldCodigo }}" name="oldCodigo" id="oldCodigo" placeholder="Ingrese codigo" label-class="text-lightblue"><!-- name="codigoAdd" id="codigoAdd" -->
                                    <!-- @error('oldCodigo') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-info"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>ESTADO</label>
                                    <x-adminlte-select wire:model="datoEstado" type="text" name="estadoAdd" id="estadoAdd" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </div>
                                        </x-slot>
                                        <option value="0">DISPONIBLE</option>
                                        <option value="1">PENDIENTE</option>
                                        <option value="2">COMPRADO</option>
                                        <option value="3">SEPULTADO</option>
                                        <option value="4">TRASLADO INTERNO</option>
                                        <option value="5">TRASLADO EXTERNO</option>
                                    </x-adminlte-select>
                                </div>
                            </div>
                        </div>
                        @if($showTraslado)
                        <div class="col-md-12" >
                            <div class="row">
                                <div class="col-md-12">
                                    <label>CEMENTERIO<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="cementerioTraslado" type="text" value="{{ $cementerioTraslado }}" name="cementerioAdd" id="cementerioAdd" autocomplete="off" placeholder="Ingrese al difunto" label-class="text-lightblue">
                                    <!-- @error('cementerioTraslado') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-place-of-worship"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($showNuevosCampos)
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>NUEVO PABELLÓN<strong style="color:red">*</strong></label>
                                    <x-adminlte-select wire:change="selectNuevoPabellon" wire:model="nuevoPabellon" name="nuevoPabellon" label-class="text-lightblue">
                                    <!-- @error('nuevoPabellon') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-exchange-alt"></i>
                                            </div>
                                        </x-slot>
                                            <option value="">-- Seleccione --</option>
                                            @foreach ($pabellones as $pabellon)
                                                <option value="{{ $pabellon->id }}">{{ $pabellon->nombre }}</option>
                                            @endforeach
                                    </x-adminlte-select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>NUEVA LETRA<strong style="color:red">*</strong></label>
                                    <x-adminlte-select wire:change="selectNuevaLetra" wire:model="nuevaLetra" type="text" name="nuevaLetraAdd" id="nuevaLetraAdd" label-class="text-lightblue">
                                    <!-- @error('nuevaLetra') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-exchange-alt"></i>
                                            </div>
                                        </x-slot>
                                        <?php $letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']; ?>
                                        <option value="">-- seleccione pabellon --</option>
                                        @foreach( $this->listaLetras as $letra)
                                            <option value="{{$letra}}" >{{ $letras[$letra-1] }}</option>
                                        @endforeach
                                        <!-- @for ($i = 0; $i <= 7; $i++)
                                            <option value="{{ $i+1 }}">{{ $letras[$i] }}</option>
                                        @endfor -->
                                    </x-adminlte-select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>NUEVA NÚMERO<strong style="color:red">*</strong></label>
                                    <x-adminlte-select wire:model="nuevoNumero" type="text" name="nuevoNumeroAdd" id="nuevoNumeroAdd" label-class="text-lightblue">
                                    <!-- @error('nuevoNumero') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-exchange-alt"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">-- seleccione pabellon --</option>
                                        @foreach( $this->listaNumeros as $numero)
                                            <option>{{ $numero }}</option>
                                        @endforeach
                                        <!-- @for ($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor -->
                                    </x-adminlte-select>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($showDifunto)
                        <div class="col-md-12 difunto">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>NOMBRE DEL/LA DIFUNTO(A)<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="nombreDifunto" type="text" value="{{ $nombreDifunto }}" name="difuntoAdd" id="difuntoAdd" autocomplete="off" placeholder="Ingrese al difunto" label-class="text-lightblue">
                                    <!-- @error('nombreDifunto') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-user text-dark"></i>
                                        </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 difunto">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>FECHA FALLECIMIENTO<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="fechaFallecimiento" type="date" value="{{ $fechaFallecimiento }}" name="fechaFaAdd" id="fechaFaAdd" label-class="text-lightblue">
                                    <!-- @error('fechaFallecimiento') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 difunto">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>FECHA ENTIERRO<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="fechaEntierro" type="date" value="{{ $fechaEntierro }}" name="fechaEntAdd" id="fechaEntAdd" label-class="text-lightblue">
                                    <!-- @error('fechaEntierro') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-4 difunto">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>HORA ENTIERRO<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="horaEntierro" type="time" value="{{ $horaEntierro }}" name="horaEntAdd" id="horaEntAdd" label-class="text-lightblue">
                                    <!-- @error('horaEntierro') <span class="error">{{ $message }}</span> @enderror -->
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>SERVICIOS FUNERARIOS<strong style="color:red">*</strong> </label>                                    
                                    <x-adminlte-select wire:model="obrasAdicionalesId" type="text" name="obrasAdicionalesId" id="obrasAdicionalesId"  autocomplete="off" placeholder="Ingresar pabellon" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-clone"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">--seleccione--</option>
                                        <option value="1">NO CUENTA</option>
                                        <option value="2">TAPIADO DE NICHO</option>
                                        <option value="3">PAGO POR CONSTANCIA DE SEPULTURA</option>
                                        <option value="4">PAGO POR CONSTANCIA DE CANCELACIÓN DE NICHO</option>
                                        <option value="5">PAGO POR OBRAS ADICIONALES (LAPIDA, MAYOLICA O ALGUNA MODIFICACION)</option>
                                    </x-adminlte-select>
                                    <!-- @error('obrasAdicionalesId') <span class="error">{{ $message }}</span> @enderror -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>COSTO<strong style="color:red">*</strong></label>
                                    <x-adminlte-input wire:model="montoTumba" type="text" value="{{ $montoTumba }}" name="montoTumba" id="montoTumba" placeholder="Ingrese costo" label-class="text-lightblue"><!-- name="costoAdd" id="costoAdd" -->
                                    @error('montoTumba') <span class="error">{{ $message }}</span> @enderror
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-coins"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>ESTADO PAGO<strong style="color:red">*</strong> </label>                                    
                                    <x-adminlte-select wire:model="estadoPagoId" type="text" name="estadoPagoId" id="estadoPagoId" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </div>
                                        </x-slot>
                                        <option value="">--seleccione--</option>
                                        <option value="1">CONTADO</option>
                                        <option value="2">FRACCIONADO EN 2 CUOTAS</option>
                                        <option value="3">FRACCIONADO EN 3 CUOTAS</option>
                                        <option value="4">FRACCIONADO EN 4 CUOTAS</option>
                                        <option value="5">CANCELADO</option>
                                        <option value="6">EXONERADO</option>
                                    </x-adminlte-select>  
                                </div>
                            </div>
                        </div>
                        @if($showDifunto)
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>ACTA DE DEFUNCION</label>
                                    <input wire:model="actaDefuncion" type="file" name="actaDefuncion" id="actaDefuncion"  >
                                        <!-- <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div> -->
                                    @error('actaDefuncion') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @if ($fullPath)
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-primary" id="btnShowPdf" name="btnShowPdf" data-toggle="modal" data-target=".showPdf">
                                        Ver Acta de Defunción <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-secondary">
                                        No hay Acta de Defunción <i class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                <label>OBSERVACIONES<strong style="color:red">*</strong> </label>                                    
                                    <x-adminlte-input wire:model="observacionTumba" type="text" name="observacionTumba" id="observacionTumba" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>


    <div class="modal fade showPdf" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="col-12">
                    <iframe src="http://192.168.30.13/cementerioLivewire/public/storage/{{$actaDefuncion}}" width="100%" height="800px"></iframe>
                </div>
            </div>
        </div>
    </div>

</div>