<?php

namespace App\Http\Livewire\Habitacion;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Habitacion;
use Livewire\WithFileUploads; // opcional si vas a subir imágenes
use Illuminate\Validation\Rule;

class Habitaciones extends Component
{
    use WithPagination;
    // use WithFileUploads; // descomenta si manejas subidas
    protected $paginationTheme = 'bootstrap'; // o 'tailwind' según tu setup

    // Datos del formulario
    public $habitacionId = null;
    public $numero;
    public $tipo = 'simple';
    public $precio;
    public $estado = 'disponible';
    public $descripcion;

    // Controles UI
    public $search = '';
    public $perPage = 10;
    public $showFormModal = false;
    public $confirmDeleteModal = false;
    public $deleteId = null;

    // Reglas base (las reglas dinámicas para unique se aplican en store/update)
    protected function rules()
    {
        $rules = [
            'numero' => [
                'required',
                'string',
                'max:10',
            ],
            'tipo' => ['required', Rule::in(['simple', 'doble', 'suite'])],
            'precio' => ['required', 'numeric', 'min:0'],
            'estado' => ['required', Rule::in(['disponible', 'ocupada', 'mantenimiento'])],
            'descripcion' => ['nullable', 'string'],
        ];

        // Unique para crear; al actualizar ignoramos la fila actual
        if ($this->habitacionId) {
            $rules['numero'][] = Rule::unique('habitacions', 'numero')->ignore($this->habitacionId);
        } else {
            $rules['numero'][] = Rule::unique('habitacions', 'numero');
        }

        return $rules;
    }

    protected $listeners = [
        'confirmDelete' => 'delete',
    ];

    public function mount()
    {
        
    }

    public function render()
    {
        $query = Habitacion::query()
            ->when($this->search, function($q) {
                $q->where('numero', 'like', "%{$this->search}%")
                  ->orWhere('descripcion', 'like', "%{$this->search}%");
            })
            ->orderBy('id', 'desc');

        $habitaciones = $query->paginate($this->perPage);

        return view('livewire.habitacion.habitaciones', compact('habitaciones'));
    }

    // Abrir formulario para crear
    public function create()
    {
        $this->resetForm();
        $this->showFormModal = true;
    }

    // Abrir formulario para editar
    public function edit($id)
    {
        $h = Habitacion::findOrFail($id);
        $this->habitacionId = $h->id;
        $this->numero = $h->numero;
        $this->tipo = $h->tipo;
        $this->precio = (float) $h->precio;
        $this->estado = $h->estado;
        $this->descripcion = $h->descripcion;
        $this->showFormModal = true;
    }

    // Guardar nueva habitación
    public function store()
    {
        $this->validate();

        Habitacion::create([
            'numero' => $this->numero,
            'tipo' => $this->tipo,
            'precio' => $this->precio,
            'estado' => $this->estado,
            'descripcion' => $this->descripcion,
        ]);

        $this->resetForm();
        $this->showFormModal = false;
        session()->flash('message', 'Habitación creada correctamente.');
    }

    // Actualizar habitación existente
    public function update()
    {
        if (! $this->habitacionId) {
            session()->flash('error', 'No se encontró la habitación a actualizar.');
            return;
        }

        $this->validate();

        $h = Habitacion::findOrFail($this->habitacionId);
        $h->update([
            'numero' => $this->numero,
            'tipo' => $this->tipo,
            'precio' => $this->precio,
            'estado' => $this->estado,
            'descripcion' => $this->descripcion,
        ]);

        $this->resetForm();
        $this->showFormModal = false;
        session()->flash('message', 'Habitación actualizada correctamente.');
    }

    // Preparar confirmación de borrado
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->confirmDeleteModal = true;
    }

    // Eliminar
    public function delete()
    {
        if (! $this->deleteId) {
            session()->flash('error', 'Id inválido para eliminar.');
            return;
        }

        $h = Habitacion::find($this->deleteId);
        if ($h) {
            $h->delete();
            session()->flash('message', 'Habitación eliminada correctamente.');
        } else {
            session()->flash('error', 'Habitación no encontrada.');
        }

        $this->deleteId = null;
        $this->confirmDeleteModal = false;
    }

    // Cambiar estado rápido (p.ej. disponible <-> ocupado)
    public function toggleEstado($id)
    {
        $h = Habitacion::findOrFail($id);
        if ($h->estado === 'disponible') {
            $h->estado = 'ocupada';
        } elseif ($h->estado === 'ocupada') {
            $h->estado = 'disponible';
        }
        // si está en mantenimiento lo dejamos igual a menos que quieras otro flujo
        $h->save();
        session()->flash('message', 'Estado actualizado.');
    }

    // Resetear formulario
    public function resetForm()
    {
        $this->habitacionId = null;
        $this->numero = null;
        $this->tipo = 'simple';
        $this->precio = null;
        $this->estado = 'disponible';
        $this->descripcion = null;
        $this->resetValidation();
    }

    // Helpers para guardar desde el mismo botón (store o update según exista id)
    public function save()
    {
        if ($this->habitacionId) {
            $this->update();
        } else {
            $this->store();
        }
    }

    // Reset de la paginación cuando se hace búsqueda o acciones para evitar páginas vacías
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
}