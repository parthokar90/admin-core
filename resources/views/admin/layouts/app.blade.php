<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body x-data="{ open: false }" class="h-screen bg-gray-100 overflow-hidden">

<div class="flex h-full">

    {{--  Mobile Toggle Button --}}
    <button @click="open = !open"
            class="md:hidden fixed top-4 left-4 z-50 bg-gray-900 text-white p-2 rounded shadow">
        ☰
    </button>

    {{-- Sidebar --}}
    <div
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed md:static inset-y-0 left-0 w-64 bg-gray-900 text-white transform md:translate-x-0 transition-transform duration-300 z-40">

        @include('admin-core::admin.include.sidebar')

    </div>

    {{-- Overlay (Mobile) --}}
    <div x-show="open"
         @click="open = false"
         class="fixed inset-0 bg-black bg-opacity-50 md:hidden z-30">
    </div>

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Topbar --}}
        @include('admin-core::admin.include.topbar')

        {{-- Page Content --}}
        <main class="p-6 flex-1 overflow-y-auto">

            {{-- Success Message --}}
            @if(session('success'))
                <div id="success-alert"
                     class="mb-4 flex items-start justify-between p-4 rounded bg-green-100 text-green-700 border border-green-300">

                    <span>{{ session('success') }}</span>

                    <button onclick="document.getElementById('success-alert').remove()"
                            class="ml-4 text-green-700 hover:text-green-900 font-bold">
                        ✕
                    </button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="mb-4 p-4 rounded bg-red-100 text-red-700 border border-red-300">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>
