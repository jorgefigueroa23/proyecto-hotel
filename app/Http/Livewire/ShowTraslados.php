<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Traslados;

class ShowTraslados extends Component
{
    public $traslados;

    public function mount()
    {
        $this->traslados = Traslados::all();
    }

    public function render()
    {
        return view('livewire.show-traslados');
    }
}
