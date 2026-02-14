<?php

namespace ParthoKar\AdminCore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ParthoKar\AdminCore\Models\Admin;
use ParthoKar\AdminCore\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = Admin::latest()->paginate(10);
        return view('admin-core::admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin-core::admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ], [
            'roles.required' => 'Please select at least one role.',
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User Created Successfully');
    }

    public function edit(Admin $user)
    {
        $roles = Role::all();
        return view('admin-core::admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, Admin $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'roles' => 'required|array|min:1',
            'roles.*' => 'exists:roles,id',
        ], [
            'roles.required' => 'Please select at least one role.',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')
                         ->with('success', 'User Updated Successfully');
    }

    public function destroy(Admin $user)
    {
        $user->roles()->detach();
        $user->delete();

        return back()->with('success', 'User Deleted Successfully');
    }
}
