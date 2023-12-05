<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $roles=Role::pluck('name','name')->all();
        return view('user.index',['users'=>$users,'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|same:conf-password',
            'roles'=>'required'
        ]);
        $input=$request ->all();
        $input['password']=Hash::make($input['password']);
        $user=User::create($input);
        $user->assignRole($request->roles);
        
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit', array('u' => $user, 'roles' => $roles));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required'
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // Actualizar contraseña solo si se proporciona una nueva contraseña
        if ($request->filled('password')) {
            $this->validate($request, [
                'password' => 'required|same:conf-password',
            ]);
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
    
        // Sincronizar roles
        $user->syncRoles($request->input('roles'));
    
        return redirect()->route('user.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/user');
    }
}
