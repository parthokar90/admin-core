<aside class="h-full w-64 bg-gray-900 text-white flex flex-col">

    {{-- Logo / Title --}}
    <div class="p-4 text-xl font-bold border-b border-gray-700">
        Admin Core
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           class="block px-3 py-2 rounded hover:bg-gray-700 transition
           {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
            Dashboard
        </a>

        {{-- User Management --}}
        <a href="{{ route('admin.users.index') }}"
           class="block px-3 py-2 rounded hover:bg-gray-700 transition
           {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
            User Management
        </a>

        {{-- Role Management --}}
        <a href="{{ route('admin.roles.index') }}"
           class="block px-3 py-2 rounded hover:bg-gray-700 transition
           {{ request()->routeIs('admin.roles.*') ? 'bg-gray-700' : '' }}">
            Role Management
        </a>

        {{-- Permission Management --}}
        <a href="{{ route('admin.permissions.index') }}"
           class="block px-3 py-2 rounded hover:bg-gray-700 transition
           {{ request()->routeIs('admin.permissions.*') ? 'bg-gray-700' : '' }}">
            Permission Management
        </a>

    </nav>

</aside>
