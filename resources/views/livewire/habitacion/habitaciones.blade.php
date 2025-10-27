<div>
    <style>
        #contenedor-vista {
            display: flex;
            width: fit-content;
        }

        .tabla-habitaciones {
            display: grid;
            grid-gap: 2px;
        }

        .encabezado-filas, .encabezado-columnas, .tabla-habitaciones {
            display: grid;
            grid-gap: 2px;
            transform: scale(1);
        }

        .numero {
            text-align: center;
            padding: 5px; 
            transform: scale(1);
            width: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .encabezado-filas {
            grid-template-columns: 1fr;
            grid-gap: 2px;
            transform: scale(1);
        }
        
        .encabezado-columnas {
            padding-left: 58px;
            margin: 5px;
            display: flex;
            flex-direction: row;
            transform: scale(1);
        }

        .encabezado-celda {
            background-color: #64C7CC;
            height: 12px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
    </style>

    <div class="col-12">                                       
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <label style="text-align: center; display: block;">PISO / SECCIÓN <strong style="color:red">*</strong></label>                                  
                        <x-adminlte-select wire:change="selectSeccion" wire:model="seccionId" name="seccionId">
                            <option value="">-- Seleccione --</option>
                            @foreach ($secciones as $seccion)
                                <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vista gráfica de habitaciones -->
    <div class="col-md-12 mt-3">
        <div class="row">
            <div class="col-md-12">
                <!-- Encabezado de columnas (números de habitación) -->
                <div class="encabezado-columnas">
                    @for ($j = 1; $j <= $columnas; $j++)
                        <div class="numero">{{ $j }}</div>
                    @endfor
                </div>

                <div id="contenedor-vista">
                    <!-- Encabezado de filas (letras o pisos) -->
                    <div class="encabezado-filas">
                        @for ($i = 0; $i < $filas; $i++)
                            <?php $letras = ['A', 'B', 'C', 'D', 'E', 'F', 'G']; ?>
                            <div class="numero">{{ $letras[$i] }}</div>
                        @endfor
                    </div>

                    <!-- Tabla visual de habitaciones -->
                    <div class="tabla-habitaciones" style="grid-template-columns: repeat({{$columnas}}, 1fr);">
                        @empty($habitaciones)
                            <p>No hay habitaciones disponibles</p>
                        @else
                            @foreach ($habitaciones as $habitacion)
                                @if($habitacion->estado == 'bloqueado')
                                    <a class="btn-habitacion-{{ $habitacion->estado }}" title="BLOQUEADA">
                                        <img src="vendor/adminlte/dist/img/habitacion-bloqueada.png" alt="Habitación bloqueada">
                                    </a>
                                @else
                                    <a
                                        wire:click="mostrarDetalleHabitacion({{ $habitacion->id }}, '{{ $habitacion->estado }}')"
                                        type="button"
                                        class="btn-habitacion-{{ $habitacion->estado }}"
                                        id="habitacion-{{ $habitacion->letra }}-{{ $habitacion->numero }}"
                                        data-toggle="modal"
                                        data-target="#habitacionDetalle"
                                        title="Habitación {{ $habitacion->numero }} - {{ ucfirst($habitacion->estado) }}"
                                    >
                                        <img src="vendor/adminlte/dist/img/habitacion-{{ $habitacion->estado }}.png" alt="Habitación {{ $habitacion->estado }}">
                                    </a>
                                @endif
                            @endforeach
                        @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <!-- Modal con detalles de la habitación seleccionada -->
    @include('livewire.habitacion.modal.detalle-habitacion')
</div>