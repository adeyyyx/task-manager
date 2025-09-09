@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Tugas Saya</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->isEmpty())
        <div class="p-4 text-center bg-gray-100 rounded">
            Tidak ada tugas
        </div>
    @else
        <!-- Grid Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($tasks as $task)
                <div class="bg-white shadow rounded-lg p-4 border">
                    <h2 class="text-lg font-semibold">{{ $task->title }}</h2>
                    <p class="text-sm text-gray-600 mb-2">{{ $task->project->name }}</p>
                    <p class="text-gray-700 mb-4">{{ $task->description }}</p>

                    <span class="inline-block px-2 py-1 text-xs rounded
                        @if($task->status === 'pending') bg-gray-200 text-gray-800
                        @elseif($task->status === 'accepted') bg-green-200 text-green-800
                        @elseif($task->status === 'on_progress') bg-yellow-200 text-yellow-800
                        @elseif($task->status === 'done') bg-blue-200 text-blue-800
                        @else bg-red-200 text-red-800 @endif">
                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                    </span>

                    <!-- Aksi -->
                    <div class="mt-4 space-x-2">
                        @if($task->status === 'pending')
                            <form action="{{ route('tasks.accept', $task->task_id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-3 py-1 bg-green-500 text-white rounded text-sm">Accept</button>
                            </form>
                            <form action="{{ route('tasks.reject', $task->task_id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-3 py-1 bg-red-500 text-white rounded text-sm">Reject</button>
                            </form>
                        @elseif($task->status === 'accepted')
                            <form action="{{ route('tasks.progress', $task->task_id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-3 py-1 bg-yellow-500 text-white rounded text-sm">On Progress</button>
                            </form>
                        @elseif($task->status === 'on_progress')
                            <form action="{{ route('tasks.done', $task->task_id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-3 py-1 bg-blue-500 text-white rounded text-sm">Selesai</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
