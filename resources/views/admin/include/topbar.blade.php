        <header class="bg-white shadow p-4 flex justify-between items-center">
            <div class="font-semibold text-lg">
                @yield('title', 'Dashboard')
            </div>

            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">
                    {{ auth('admin')->user()->name ?? '' }}
                </span>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="text-red-500 text-sm font-medium">
                        Logout
                    </button>
                </form>
            </div>
        </header>