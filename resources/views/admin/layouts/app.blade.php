<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
     @include('admin-core::admin.include.sidebar')

    {{-- Main Content --}}
    <div class="flex-1 flex flex-col">

        {{-- Topbar --}}
        @include('admin-core::admin.include.topbar')

        {{-- Page Content --}}
        <main class="p-6 flex-1">
          @if(session('success'))
                <div id="success-alert"
                    class="mb-4 flex items-start justify-between p-4 rounded bg-green-100 text-green-700 border border-green-300">

                    <span>
                        {{ session('success') }}
                    </span>

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
