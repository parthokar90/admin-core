@extends('admin-core::admin.layouts.app')

@section('title', 'Edit Permission')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">
    
    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Permission Name</label>
            <input type="text" name="name"
                   value="{{ old('name', $permission->name) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text" name="slug"
                   value="{{ old('slug', $permission->slug) }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Update Permission
        </button>

    </form>

</div>

@endsection
