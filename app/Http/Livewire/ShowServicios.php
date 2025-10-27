<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Obras_adicionales;

class ShowServicios extends Component
{
    public $servicios;
    public $servicioId;
    public $descripcion, $resolucion, $monto;
    public $descripcionEdit, $resolucionEdit, $montoEdit;

    protected $listeners = ['editService'];

    public function mount()
    {
        $this->servicios = Obras_adicionales::all();
    }

    public function render()
    {
        return view('livewire.show-servicios');
    }

    public function editService($id){
        $servicio = Obras_adicionales::find($id);
        $this->descripcionEdit = $servicio->descripcion;
        $this->resolucionEdit = $servicio->resolucion;
        $this->montoEdit = $servicio->monto;
        $this->servicioId = $id;
        /* dd($id); */

        $this->emit('openEdit');
        /* $this->emit('openEdit'); */
    }

    public function delete($id)
    {
        Obras_adicionales::destroy($id);
        $this->emit('eliminado');
        $this->mount();
    }

    public function servicioCreate()
    {
        $this->validate([
            'descripcion' => 'required',
            'resolucion' => 'required',
            'monto' => 'required',
        ]);

        Obras_adicionales::create([
            'descripcion' => $this->descripcion,
            'resolucion' => $this->resolucion,
            'monto' => $this->monto,
        ]);

        $this->descripcion = '';
        $this->resolucion = '';
        $this->monto = '';

        $this->emit('servicioAdd');
        $this->mount();
    }

    public function servicioUpdate()
    {
        $this->validate([
            'descripcionEdit' => 'required',
            'resolucionEdit' => 'required',
            'montoEdit' => 'required',
        ]);

        $servicio = Obras_adicionales::find($this->servicioId);
        $servicio->descripcion = $this->descripcionEdit;
        $servicio->resolucion = $this->resolucionEdit;
        $servicio->monto = $this->montoEdit;
        $servicio->save();

        $this->emit('servicioUpdate');
        $this->render();
    }
}
