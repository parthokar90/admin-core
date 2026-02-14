<?php

namespace ParthoKar\AdminCore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ParthoKar\AdminCore\Models\Role;
use ParthoKar\AdminCore\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return view('admin-core::admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin-core::admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
       $request->validate([
        'name' => 'required|unique:roles,name',
        'permissions' => 'required|array|min:1',
        'permissions.*' => 'exists:permissions,id',
       ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        if ($request->permissions) {
            $role->permissions()->sync($request->permissions);
        }

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin-core::admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'permissions' => 'required|array|min:1',
        'permissions.*' => 'exists:permissions,id',
        ], [
            'permissions.required' => 'At least one permission must be selected.',
            'permissions.min' => 'At least one permission must be selected.',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $role->permissions()->sync($request->permissions ?? []);

        return redirect()
            ->route('admin.roles.index')
            ->with('success', 'Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('success', 'Role Deleted Successfully');
    }
}
