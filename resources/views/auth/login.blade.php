<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN (for package demo UI) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">

    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Admin Panel</h1>
        <p class="text-gray-500 text-sm">Sign in to your account</p>
    </div>

    {{-- Session Error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded-lg text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Email Address
            </label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email') }}"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('email') border-red-500 @enderror"
                placeholder="admin@example.com"
            >
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Password
            </label>
            <input 
                type="password" 
                name="password"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('password') border-red-500 @enderror"
                placeholder="Enter password"
            >
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit Button --}}
        <button 
            type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg font-semibold transition duration-200"
        >
            Sign In
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-gray-400">
        Admin Core v1.1
    </div>
</div>

</body>
</html>
