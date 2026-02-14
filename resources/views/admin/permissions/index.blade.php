@extends('admin-core::admin.layouts.app')

@section('title', 'Permission Management')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Permissions</h2>
        <a href="{{ route('admin.permissions.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">
            + Create Permission
        </a>
    </div>

    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">#</th>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Slug</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr class="border-t">
                <td class="p-2">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $permission->name }}</td>
                <td class="p-2">{{ $permission->slug }}</td>
                <td class="p-2 space-x-2">

                    <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                       class="text-blue-600">Edit</a>

                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
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
        {{ $permissions->links() }}
    </div>

</div>

@endsection
