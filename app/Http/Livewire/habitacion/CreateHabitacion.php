<?php

namespace App\Http\Livewire\Habitacion;

use Livewire\Component;
use App\Models\Habitacion;
use App\Models\Seccion; // Si tienes secciones o pisos relacionados

class CreateHabitacion extends Component
{
    // Propiedades del formulario
    public $numeroHabitacion;
    public $tipoHabitacion;
    public $precioHabitacion;
    public $estadoHabitacion = 'disponible';
    public $descripcionHabitacion;
    public $seccionId;

    // Método para guardar una nueva habitación
    public function storeHabitacion()
    {
        $this->validate([
            'numeroHabitacion'     => 'required|string|max:10|unique:habitacions,numero',
            'tipoHabitacion'       => 'required|string|max:50',
            'precioHabitacion'     => 'required|numeric|min:0',
            'estadoHabitacion'     => 'required|string',
            'seccionId'            => 'required|exists:seccions,id',
            'descripcionHabitacion'=> 'nullable|string|max:255',
        ]);

        // Crear habitación
        $habitacion = new Habitacion();
        $habitacion->numero      = $this->numeroHabitacion;
        $habitacion->tipo        = $this->tipoHabitacion;
        $habitacion->precio      = $this->precioHabitacion;
        $habitacion->estado      = $this->estadoHabitacion;
        $habitacion->descripcion = $this->descripcionHabitacion;
        $habitacion->seccion_id  = $this->seccionId;
        $habitacion->save();

        // Emitir evento para refrescar tabla/lista
        $this->emit('refresh');

        // Limpiar los campos después de guardar
        $this->reset([
            'numeroHabitacion', 
            'tipoHabitacion', 
            'precioHabitacion', 
            'estadoHabitacion', 
            'descripcionHabitacion', 
            'seccionId'
        ]);

        // Cerrar el modal (si usas JS para eso)
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.habitacion.modal.create-habitacion', [
            'secciones' => Seccion::all(),
        ]);
    }
}
