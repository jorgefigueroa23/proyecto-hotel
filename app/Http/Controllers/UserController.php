<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $dataUsers = User::where('rol','!=','root')->get();
        return view('administracion/usuario/index', compact('dataUsers'));
    }
    
    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nameCreate' => 'required',
            'numdocCreate' => 'required|unique:users,numdoc',
            'emailCreate' => 'required|unique:users,email',
            'usernameCreate' => 'required|unique:users,username',
            'rolCreate' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
            'numdoc.min' => 'Ingrese 8 carateres como mínimo',
            'numdoc.max' => 'Ingrese 8 carateres como maximo',
        ]);

        if($validate->fails()){

            return back()->withErrors($validate->errors())->withInput()->with('user', 'empty');
        
        }else{
                User::create([
                    'name'      =>$request->nameCreate,
                    'numdoc'    =>$request->numdocCreate,
                    'username'  =>$request->usernameCreate,
                    'estado'    =>'1',
                    'password'  =>Hash::make($request->numdocCreate),
                    'email'     =>$request->emailCreate,
                    'rol'       =>$request->rolCreate,
                ])->assignRole($request->rolCreate);

            return redirect()->route('show-usuarios')->with('user', 'ok');
        }
    }
    
    public function edit($id)
    { 
        $user = User::find($id);
        $roles = Role::all();
        try{
            return view('Administracion/usuarios/editar', compact('user', 'roles'));
        }catch(\Exception $e){
            return redirect()->route('user.index')->with('user', 'error');
        }
    }

    
    public function update($id, Request $request)
    {

        $validate = Validator::make($request->all(), [
            'nameUpdate' => 'required',
            'numdocUpdate' => 'required',
            'emailUpdate' => 'required',
            'rolUpdate' => 'required',
            'estadoUpdate' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
            'numdoc.min' => 'Ingrese 8 carateres como mínimo',
            'numdoc.max' => 'Ingrese 8 carateres como maximo',
        ]);

        if($validate->fails()){
            /* return back()->with('user', 'empty'); */
            return redirect()->route('user.index')->with('user', 'empty');
        }else{
            try{
                $user = User::find($id);
                $user->update([
                    'name'      =>$request->nameUpdate,
                    'numdoc'    =>$request->numdocUpdate,
                    'username'  =>$request->usernameUpdate,
                    'estado'    =>$request->estadoUpdate,
                    'email'     =>$request->emailUpdate,
                    'rol'       =>$request->rolUpdate,
                ]);
                $user->syncRoles($request->rolUpdate);
                return redirect()->back()->with('user', 'update');
            }catch(\Exception $e){
                return redirect()->back()->with('user', 'error');
            }
        }
    }
    
    public function destroy($id)
    {
        try{
            $user = User::find($id);
            $user->update(['estado' => '0']);
            /* return redirect()->back()->with('user', 'delete'); */
            return redirect()->route('user.index')->with('user', 'delete');
        }catch(\Exception $e){
            /* return redirect()->back()->with('user', 'error'); */
            return redirect()->route('user.index')->with('user', 'error');
        }
    }

    public function activar($id)
    {
        try{
            $user = User::find($id);
            $user->update(['estado' => '1']);
            return redirect()->route('user.index')->with('user', 'active');
        }catch(\Exception $e){
            return redirect()->back()->with('user', 'error');
            return redirect()->route('user.index')->with('user', 'error');
        }
    }

    public function storeFile()
    {
        /* if($request->isMethod('POST'))
        {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->storeAs('',$name.'.'.$file->getClientOriginalExtension(), 'public');
        } */

        dd($request->all());

        /* return response()->json(['success' => 'File uploaded successfully']); */
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);

        if($user->hasRole('admin') || $user->hasRole('2')){

            try{
            $user->password = Hash::make($user->numdoc);
            $user->syncRoles('admin');
            $user->save();


            return redirect()->route('user.index')->with('user', 'reset');

            } catch (\Throwable $th) {
                return redirect()->route('user.index')->with('user', 'error');
            }

        }else{
            try{
            $user->password = Hash::make($user->numdoc);
            $user->syncRoles('user');
            $user->save();

            return redirect()->route('user.index')->with('user', 'reset');
            
            } catch (\Throwable $th) {
                return redirect()->route('user.index')->with('user', 'error');
            }
        }

    }

    public function updatepass(Request $request)
    {
        $user = auth()->user();

        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ],[
            'required' => 'Ingrese datos solicitados',
        ]);

        if($validate->fails()){
            return redirect()->back()->with('password', 'empty');
            return redirect()->route('profile')->with('password', 'empty');
        }else{
            if(Hash::check($request->old_password, $user->password)){
                if($request->new_password == $request->new_password_confirmation){
                    try
                    {
                        $user->update(['password' => Hash::make($request->new_password)]);
                        return redirect()->route('profile')->with('password', 'ok');
                    }catch(\Exception $e)
                    {
                        return redirect()->route('profile')->with('password', 'fail');
                    }
                }else{
                    /* return redirect()->back()->with('password', 'nomatch'); */
                    return redirect()->route('profile')->with('password', 'nomatch');
                }
            }else{
                /* return redirect()->back()->with('password', 'incorrect'); */
                return redirect()->route('profile')->with('password', 'incorrect');
            }
        }
    }
}
