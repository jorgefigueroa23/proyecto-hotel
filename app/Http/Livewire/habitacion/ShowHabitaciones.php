<?php

namespace App\Http\Livewire\Habitacion;

use Livewire\Component;
use App\Models\Habitacion;

class ShowHabitaciones extends Component
{
    public $habitaciones;

    // Campos editables
    public $numeroEdit;
    public $tipoEdit;
    public $precioEdit;
    public $descripcionEdit;
    public $estadoEdit;

    // Campos de control
    public $oldNumero;
    public $idHabitacion;

    protected $listeners = [
        'updateHabitacion',
        'editHabitacion',
        'deleteHabitacion',
        'enableHabitacion'
    ];

    /** Cargar habitaciones al iniciar */
    public function mount()
    {
        $this->loadHabitaciones();
    }

    /** Refrescar lista de habitaciones */
    public function loadHabitaciones()
    {
        $this->habitaciones = Habitacion::orderBy('numero', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.habitacion.show-habitaciones');
    }

    /** Actualizar habitación */
    public function updateHabitacion($id)
    {
        $this->validate([
            'numeroEdit'     => 'required|string|max:10',
            'tipoEdit'       => 'required|string|max:50',
            'precioEdit'     => 'required|numeric|min:0',
            'estadoEdit'     => 'required|string|max:50',
            'descripcionEdit'=> 'nullable|string|max:255',
        ]);

        $habitacion = Habitacion::find($id);

        if (!$habitacion) {
            $this->emit('error', 'Habitación no encontrada.');
            return;
        }

        $habitacion->update([
            'numero'      => $this->numeroEdit,
            'tipo'        => $this->tipoEdit,
            'precio'      => $this->precioEdit,
            'estado'      => $this->estadoEdit,
            'descripcion' => $this->descripcionEdit,
        ]);

        $this->emit('actualizarHabitacion');
        $this->emit('refreshDatatable');
    }

    /** Cargar datos para edición */
    public function editHabitacion($idHabitacion)
    {
        $this->idHabitacion = $idHabitacion;
        $habitacion = Habitacion::find($idHabitacion);

        if (!$habitacion) {
            $this->emit('error', 'Habitación no encontrada.');
            return;
        }

        $this->oldNumero      = $habitacion->numero;
        $this->numeroEdit     = $habitacion->numero;
        $this->tipoEdit       = $habitacion->tipo;
        $this->precioEdit     = $habitacion->precio;
        $this->estadoEdit     = $habitacion->estado;
        $this->descripcionEdit= $habitacion->descripcion;

        $this->emit('editarHabitacion');
    }

    /** Marcar habitación en mantenimiento (deshabilitar) */
    public function deleteHabitacion($id)
    {
        $habitacion = Habitacion::find($id);

        if (!$habitacion) {
            $this->emit('error', 'Habitación no encontrada.');
            return;
        }

        $habitacion->update(['estado' => 'mantenimiento']);
        $this->emit('habitacionDeshabilitada');
        $this->loadHabitaciones();
    }

    /** Rehabilitar habitación (volver a disponible) */
    public function enableHabitacion($id)
    {
        $habitacion = Habitacion::find($id);

        if (!$habitacion) {
            $this->emit('error', 'Habitación no encontrada.');
            return;
        }

        $habitacion->update(['estado' => 'disponible']);
        $this->emit('habitacionHabilitada');
        $this->loadHabitaciones();
    }
}