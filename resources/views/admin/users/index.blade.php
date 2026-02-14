@extends('admin-core::admin.layouts.app')

@section('title', 'Users Management')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-semibold">Users</h2>
        <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">
            + Create User
        </a>
    </div>

    <table class="w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">#</th>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Roles</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="border-t">
                <td class="p-2">{{ $loop->iteration }}</td>
                <td class="p-2">{{ $user->name }}</td>
                <td class="p-2">{{ $user->email }}</td>
                <td class="p-2">
                    {{ $user->roles->pluck('name')->join(', ') }}
                </td>
                <td class="p-2 space-x-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@endsection
