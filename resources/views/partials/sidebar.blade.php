<aside class="w-64 bg-gradient-to-b from-blue-800 to-blue-600 text-white min-h-screen p-6 shadow-lg">
    <div class="flex items-center space-x-2 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-8 w-8 text-yellow-300"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m2 4H7m6-16l-5.5 9h11L13 20V4z" />
        </svg>
        <h2 class="text-2xl font-bold tracking-wide">TodoList</h2>
    </div>

    <nav class="space-y-3">
        @if(auth()->check())
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1m-6 6H7a4 4 0 01-4-4v-1h6v5zm0-10V4a4 4 0 114 4v2h-4z" />
                    </svg>
                    Kelola User
                </a>

                <a href="{{ route('projects.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                    Kelola Project
                </a>

                <a href="{{ route('tasks.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m2 4H7m6-16l-5.5 9h11L13 20V4z" />
                    </svg>
                    Kelola Task
                </a>
            @else
                <a href="{{ route('tasks.my') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7" />
                    </svg>
                    Tugas Saya
                </a>
            @endif
        @endif
    </nav>
</aside>
