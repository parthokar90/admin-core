  <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-4 text-xl font-bold border-b border-gray-700">
            Admin Core
        </div>

        <nav class="flex-1 p-4 space-y-2">

            <a href="{{route('admin.dashboard')}}"
               class="block px-3 py-2 rounded hover:bg-gray-700">
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}"
               class="block px-3 py-2 rounded hover:bg-gray-700">
                User Management
            </a>

            <a href="{{ route('admin.roles.index') }}"
               class="block px-3 py-2 rounded hover:bg-gray-700">
                Role Management
            </a>

            <a href="{{ route('admin.permissions.index') }}"
               class="block px-3 py-2 rounded hover:bg-gray-700">
                Permission Management
            </a>

        </nav>
    </aside>