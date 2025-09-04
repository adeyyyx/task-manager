@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Tugas Saya</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Project</th>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Deskripsi</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td class="p-2 border">{{ $task->project->name }}</td>
                    <td class="p-2 border">{{ $task->title }}</td>
                    <td class="p-2 border">{{ $task->description }}</td>
                    <td class="p-2 border">{{ ucfirst($task->status) }}</td>
                    <td class="p-2 border space-x-1">
                        @if($task->status === 'pending')
                            <form action="{{ route('tasks.accept', $task) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-2 py-1 bg-green-500 text-white rounded">Accept</button>
                            </form>
                            <form action="{{ route('tasks.reject', $task) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-2 py-1 bg-red-500 text-white rounded">Reject</button>
                            </form>
                        @elseif($task->status === 'accepted')
                            <form action="{{ route('tasks.progress', $task) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-2 py-1 bg-yellow-500 text-white rounded">On Progress</button>
                            </form>
                        @elseif($task->status === 'progress')
                            <form action="{{ route('tasks.done', $task) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button class="px-2 py-1 bg-blue-500 text-white rounded">Selesai</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">Tidak ada tugas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
