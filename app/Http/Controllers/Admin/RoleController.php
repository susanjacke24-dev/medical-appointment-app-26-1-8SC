<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; // ← IMPORTANTE

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        // Traer todos los permisos
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        // Crear rol
        $role = Role::create(['name' => $request->name]);

        // Asignar permisos si existen
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol creado correctamente',
            'text' => 'El rol se ha creado correctamente'
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update(['name' => $request->name]);

        // Sincronizar permisos
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.index')->with('swal', [
            'icon' => 'success',
            'title' => 'Rol actualizado correctamente',
            'text' => 'El rol se ha modificado correctamente'
        ]);
    }

    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol eliminado correctamente',
            'text' => 'El rol se ha eliminado correctamente'
        ]);

        return redirect()->route('admin.roles.index');
    }
}