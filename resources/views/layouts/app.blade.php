<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Konten Utama --}}
    <div class="flex-1 min-h-screen p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">@yield('title', 'Dashboard')</h1>
            <div>
                @auth
                    <span class="mr-4">Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white">Logout</button>
                    </form>
                @endauth
            </div>
        </div>

        <div class="bg-white shadow rounded p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
