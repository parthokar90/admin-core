@extends('admin-core::admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="space-y-6">

    {{-- Welcome Card --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold text-gray-800">
            Welcome, {{ auth('admin')->user()->name ?? 'Admin' }}
        </h2>
        <p class="text-gray-500 text-sm mt-2">
            You are logged in to the Admin Panel.
        </p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Total Users --}}
        <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
            <h3 class="text-sm text-gray-500">Total Users</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">
                {{ $totalUsers ?? 0 }}
            </p>
        </div>

        {{-- Total Roles --}}
        <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
            <h3 class="text-sm text-gray-500">Total Roles</h3>
            <p class="text-3xl font-bold text-green-600 mt-2">
                {{ $totalRoles ?? 0 }}
            </p>
        </div>

        {{-- Total Permissions --}}
        <div class="bg-white rounded-xl shadow p-6 hover:shadow-lg transition">
            <h3 class="text-sm text-gray-500">Total Permissions</h3>
            <p class="text-3xl font-bold text-purple-600 mt-2">
                {{ $totalPermissions ?? 0 }}
            </p>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4 text-gray-700">
            Quick Actions
        </h3>

        <div class="flex flex-wrap gap-4">

            <a href="{{ route('admin.users.index') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition text-sm">
                Manage Users
            </a>

            <a href="{{ route('admin.roles.index') }}"
               class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm">
                Manage Roles
            </a>

            <a href="{{ route('admin.permissions.index') }}"
               class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition text-sm">
                Manage Permissions
            </a>

        </div>
    </div>

</div>

@endsection
