@extends('admin-core::admin.layouts.app')

@section('title', 'Role Management')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Roles</h2>
        <a href="{{ route('admin.roles.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">
            + Create Role
        </a>
    </div>

    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">#</th>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr class="border-t">
                <td class="p-2">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $role->name }}</td>
                <td class="p-2 space-x-2">

                    <a href="{{ route('admin.roles.edit', $role->id) }}"
                       class="text-blue-600">Edit</a>

                    <form action="{{ route('admin.roles.destroy', $role->id) }}"
                          method="POST"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $roles->links() }}
    </div>

</div>

@endsection
