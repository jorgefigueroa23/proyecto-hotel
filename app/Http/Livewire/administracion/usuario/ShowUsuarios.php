<?php

namespace App\Http\Livewire\Administracion\Usuario;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShowUsuarios extends Component
{
    public $dataUsers;

    public $nombre, $username, $numdoc, $email, $rol, $estadoUser, $userId;
    protected $listeners = ['editUser', 'deleteUser', 'enableUser'];
    protected $rule = [
        'nombre' => 'required',
        /* 'username' => 'required',
        'numdoc' => 'required',
        'email' => 'required',
        'rol' => 'required',
        'estadoUser' => 'required' */
    ];

    public function editUser($id)
    {
        $user = User::find($id);
        $this->nombre = $user->name;
        $this->username = $user->username;
        $this->numdoc = $user->numdoc;
        $this->email = $user->email;
        $this->rol = $user->rol;
        $this->estadoUser = $user->estado;
        $this->userId = $id;

        /* $this->render(); */
        
        /* $this->render(); */

        $this->emit('editarUsuario');
    }

    public function updateUser($id)
    {
        try{
            $user = User::find($id);
            $user->update([
                'name' => $this->nombre,
                'username' => $this->username,
                'numdoc' => $this->numdoc,
                'email' => $this->email,
                'rol' => $this->rol,
                'estado' => $this->estadoUser
            ]);
            $user->syncRoles($this->rol);

        $this->emit('actualizaUsuario',$id);
        $this->emit('closeEditUser');
        $this->mount(); 
        }catch(\Exception $e){
            $this->emit('error','No se puede actualizar el usuario');
        }
    }

    public function deleteUser($id)
    {
        /* try{
            $user = User::find($id);
            $user->update(['estado' => 0]);
            $this->emit('eliminarUsuario');
            $this->mount();
        }catch(\Exception $e){
            $this->emit('error','No se puede eliminar el usuario');
        } */

        $user = User::find($id);
        $user->update(['estado' => 0]);
        $this->emit('eliminarUsuario');
        $this->mount();
    }

    public function enableUser($id)
    {
        $user = User::find($id);
        $user->update(['estado' => 1]);
        $this->emit('habilitarUsuario');
        $this->mount();
    }

    public function disableUser($id)
    {
        $user = User::find($id);
        $user->update(['estado' => 0]);
        $this->emit('eliminarUsuario');
        $this->mount();
    }

    public function resetUser($id)
    {
        $user = User::find($id);
        $user->password = hash::make($user->numdoc);
        $user->save();
        $this->emit('resetUser');
        $this->mount();
    }

    public function mount()
    {
        $this->nombre = '';
        $this->username = '';
        $this->numdoc = '';
        $this->email = '';
        $this->rol = '';
        $this->estadoUser = '';
        $this->userId = '';

        $this->dataUsers = User::all()->where('rol','!=','root');
    }

    public function render()
    {
        return view('livewire.administracion.usuario.show-usuarios');
    }
}
