<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Obras_adicionales;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function profile(){       

        return view('profile.index', array('user' => Auth::user()) );
    }

    public function servicioCreate(){
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

    public function servicioEdit(){

    }

    public function servicioUpdate(){
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
            $this->mount();
        }
    }

    public function servicioDelete(){

    }

    
}
