@extends('admin-core::admin.layouts.app')

@section('title', 'Create User')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-medium">Assign Roles</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($roles as $role)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                        <span>{{ $role->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">Save User</button>

    </form>

</div>

@endsection
