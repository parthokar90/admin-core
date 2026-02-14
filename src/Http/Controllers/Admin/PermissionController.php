<?php

namespace ParthoKar\AdminCore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ParthoKar\AdminCore\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->paginate(10);
        return view('admin-core::admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin-core::admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
            'slug' => 'required|unique:permissions,slug'
        ]);

        Permission::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.permissions.index')
                         ->with('success', 'Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        return view('admin-core::admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
            'slug' => 'required|unique:permissions,slug,' . $permission->id,
        ]);

        $permission->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('admin.permissions.index')
                         ->with('success', 'Permission Updated Successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return back()->with('success', 'Permission Deleted Successfully');
    }
}
