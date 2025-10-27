<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EstadoPago;

class ShowEstadoPago extends Component
{
    public $estadoPagos;

    public function mount()
    {
        $this->estadoPagos = EstadoPago::all();
    }
    
    public function render()
    {
        return view('livewire.show-estado-pago');
    }
}
