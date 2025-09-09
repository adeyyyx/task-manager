<aside class="w-64 bg-gradient-to-b from-blue-800 to-blue-600 text-white min-h-screen p-6 shadow-lg">
    <div class="flex items-center space-x-2 mb-10">
        <!-- Icon Clipboard List -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 3h6a2 2 0 012 2v2a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2zM5 7v12a2 2 0 002 2h10a2 2 0 002-2V7" />
        </svg>
        <h2 class="text-2xl font-bold tracking-wide">TodoList</h2>
    </div>

    <nav class="space-y-3">
        @if(auth()->check())
            @if(auth()->user()->role === 'admin')
                {{-- <a href="{{ route('users.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <!-- Icon User Settings -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 0112 15a4 4 0 016.879 2.804M15 11a4 4 0 10-8 0 4 4 0 008 0z" />
                    </svg>
                    Kelola User
                </a> --}}

                <a href="{{ route('projects.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <!-- Icon Folder -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h3.172a2 2 0 011.414.586l1.828 1.828A2 2 0 0012.828 8H19a2 2 0 012 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                    </svg>
                    Kelola Project
                </a>

                <a href="{{ route('tasks.index') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <!-- Icon Check Square -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4M7 7h10a2 2 0 012 2v6a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
                    </svg>
                    Kelola Task
                </a>
            @else
                <a href="{{ route('tasks.my') }}"
                   class="flex items-center px-4 py-2 rounded-lg transition hover:bg-blue-500">
                    <!-- Icon Clipboard Check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4M9 5h6M9 3h6a2 2 0 012 2v2a2 2 0 01-2 2H9a2 2 0 01-2-2V5a2 2 0 012-2z" />
                    </svg>
                    Tugas Saya
                </a>
            @endif
        @endif
    </nav>
</aside>
