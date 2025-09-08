<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex min-h-screen">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Konten Utama --}}
    <div class="flex-1 flex flex-col min-h-screen">
        <header class="p-6 bg-white shadow flex justify-between items-center">
            <h1 class="text-2xl font-bold">@yield('title', 'Dashboard')</h1>
            <div>
                @auth
                    <div class="flex items-center gap-4">
                        <span>Halo, <span class="font-semibold">{{ auth()->user()->name }}</span>
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-0.5 rounded ml-1">{{ auth()->user()->role }}</span>
                        </span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white shadow transition-all duration-200 hover:bg-red-600 hover:scale-105 flex items-center gap-1">
                                <!-- Icon Logout -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </header>

        <div class="flex-1 p-6 bg-gray-50">
            <div class="bg-white shadow rounded p-4 overflow-x-auto">
                <div class="w-full">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
