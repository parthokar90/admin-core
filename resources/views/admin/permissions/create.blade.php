@extends('admin-core::admin.layouts.app')

@section('title', 'Create Permission')

@section('content')

<div class="bg-white p-6 rounded-xl shadow">

    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block mb-1 font-medium">Permission Name</label>
            <input type="text" name="name"
                   value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Slug</label>
            <input type="text" name="slug"
                   value="{{ old('slug') }}"
                   class="w-full border rounded px-3 py-2"
                   required>
        </div>

        <button class="bg-indigo-600 text-white px-4 py-2 rounded">
            Save Permission
        </button>

    </form>

</div>

@endsection
