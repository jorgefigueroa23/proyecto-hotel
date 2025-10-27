<?php

namespace App\Http\Livewire\Administracion\Usuario;

use App\Libraries\Utilities\Functions;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Usuario;

class Usuarios extends Component
{

    public function render()
    {
        return view('viewMain.usuariosLista');
    }
}
