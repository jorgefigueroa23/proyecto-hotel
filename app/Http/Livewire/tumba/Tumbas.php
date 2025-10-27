<?php

namespace App\Http\Livewire\Tumba;

use Livewire\Component;
use App\Models\Tumba;

class Tumbas extends Component
{
    public $tumba = [];
    public $tumbaId;
    public $titular;
    public $dni;
    public $celular;
    public $estado;
    public $numero;
    public $letra;
    public $codigo;
    public $tipoTraslado;
    public $cementerio;
    public $difunto;
    public $fechaEntierro;
    public $fechaFallecimiento;
    public $obrasAdicionalesId;
    public $estadoPagoId;
    public $costo;

    public function mount()
    {
        $this->tumbaId;
        $this->titular;
        $this->dni;
        $this->celular;
        $this->estado;
        $this->numero;
        $this->letra;
        $this->codigo;
        $this->tipoTraslado;
        $this->cementerio;
        $this->difunto;
        $this->fechaEntierro;
        $this->fechaFallecimiento;
        $this->obrasAdicionalesId;
        $this->estadoPagoId;
        $this->costo;
    }

    public function render()
    {
        return view('livewire.tumbas');
    }

    public function actualizarTumba()
    {
        $tumba = Tumba::find($this->tumba['id']);
        $tumba->update([
            'nombre' => $this->tumba['nombre'],
            'descripcion' => $this->tumba['descripcion'],
            'estado' => $this->tumba['estado'],
            'pabellon_id' => $this->tumba['pabellon_id']
        ]);
    }



    public static function infoTumba0($id)
    {
        $tumba = Tumba::findOrFail($id);
        $tumbaId = $tumba->id;
        $titular = $tumba->titular;
        $dni = $tumba->dni;
        $celular = $tumba->celular;
        $estado = $tumba->estado;
        $numero = $tumba->numero;
        $letra = $tumba->letra;
        $codigo = $tumba->oldCodigo;
        $tipoTraslado = $tumba->tipoTrasladoAdd;
        $cementerio = $tumba->cementerioAdd;
        $difunto = $tumba->nombre_difunto;
        $fechaEntierro = $tumba->fecha_entierro;
        $fechaFallecimiento = $tumba->fecha_fallecimiento;
        $obrasAdicionalesId = $tumba->obrasAdicionales_id;
        $estadoPagoId = $tumba->estadoPago_id;
        $costo = $tumba->montoTumba;
    }

}
