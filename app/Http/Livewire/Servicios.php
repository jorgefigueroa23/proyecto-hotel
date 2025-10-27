<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Obras_adicionales;


class Servicios extends Component
{
    public $obras_adicionales;
    public $descripcion, $resolucion, $monto;
    public $descripcionEdit, $resolucionEdit, $montoEdit;
    public $servicioId;

    public function render()
    {
        return view('livewire.servicios');
    }

    protected $listeners = ['servicioAgregar' => 'render', 'eliminado' => 'mount', 'openEdit' => 'mount'];

    public function mount()
    {
        $this->obras_adicionales = Obras_adicionales::all();
    }

    public function edit($id)
    {
        $servicio = Obras_adicionales::find($id);
        $this->descripcionEdit = $servicio->descripcion;
        $this->resolucionEdit = $servicio->resolucion;
        $this->montoEdit = $servicio->monto;
        $this->servicioId = $id;

        dd($this->$servicioId);

    }

}
