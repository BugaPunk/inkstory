<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaPermisos = Permission::all();
        return view('permission.index', compact('listaPermisos'));
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
        $request->validate([
            'name'=>'required|unique:permissions,name',
        ]);
        Permission::create($request->all());
        return redirect()->route('permission.index');
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
        // $permiso = Permission::find($id);
        // return view('permission.edit', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name' => 'required|unique:permissions,name,' . $id,
        // ]);
    
        // $permiso = Permission::find($id);
        // $permiso->update($request->all());
    
        // return redirect()->route('permission.index')->with('success', 'Permiso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permiso = Permission::findOrFail($id);
        $permiso->delete();
        return redirect('/permission');
    }
}
