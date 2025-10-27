<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Entierro;


class ShowEnterrados extends Component
{
    public $enterrados;

    public $nombreDifunto, $fechaEntierro, $fechaFallecimiento, $horaEntierro, $nombreTumba, $nombrePabellon;

    public function mount()
    {
        $enterrados = Entierro::join('detalle_entierro','detalle_entierro.id_entierro','=','entierros.id')
                                    ->join('tumbas','tumbas.id','=','detalle_entierro.id_tumba')
                                    ->join('pabellons','pabellons.id','=','tumbas.pabellon_id')
                                    ->where('detalle_entierro.estadoDetEntierro','=','1')
                                    ->get();

        $this->enterrados = $enterrados;

        $this->nombreDifunto = $enterrados[0]->nombreDifunto;
        $this->fechaEntierro = $enterrados[0]->fechaEntierro;
        $this->fechaFallecimiento = $enterrados[0]->fechaFallecimiento;
        $this->horaEntierro = $enterrados[0]->horaEntierro;
        $this->nombreTumba = $enterrados[0]->nombreTumba;
        $this->nombrePabellon = $enterrados[0]->nombre;
    }
    public function render()
    {
        return view('livewire.show-enterrados');
    }
}
