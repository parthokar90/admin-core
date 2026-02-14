@extends('admin-core::admin.layouts.app')

@section('title', 'Create Role')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf

        {{-- Role Name --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium">Role Name</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        {{-- Permissions --}}
        <div class="mb-4">
            <label class="block mb-2 font-medium">Assign Permissions</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach($permissions as $permission)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox"
                               name="permissions[]"
                               value="{{ $permission->id }}"
                               {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                        <span>{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Save Role
        </button>

    </form>

</div>

@endsection
