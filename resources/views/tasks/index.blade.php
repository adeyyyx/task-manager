@extends('layouts.app')

@section('title', 'Kelola Task')

@section('content')
<a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-3 py-1 rounded shadow transition-all duration-200 hover:bg-green-600 hover:scale-105">Tambah Task</a>

<table class="table-auto w-full mt-4">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Judul</th>
            <th class="px-4 py-2">Project</th>
            <th class="px-4 py-2">Assigned To</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $task->title }}</td>
            <td class="px-4 py-2">{{ $task->project->name ?? '-' }}</td>
            <td class="px-4 py-2">{{ $task->assignedUser->name ?? '-' }}</td>
            <td class="px-4 py-2">{{ ucfirst($task->status) }}</td>
            <td class="px-4 py-2 flex items-center gap-2">
                <a href="{{ route('tasks.edit',$task) }}"
                class="bg-yellow-500 text-white px-3 py-1 rounded shadow transition-all duration-200 hover:bg-yellow-600 hover:scale-105 flex items-center gap-1">
                    <!-- Icon Edit -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2H7v-4h4z" />
                    </svg>
                    Edit
                </a>
        <form action="{{ route('tasks.destroy',$task) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button class="bg-red-500 text-white px-3 py-1 rounded shadow transition-transform duration-200 hover:scale-105 hover:bg-red-600 flex items-center gap-1">
                <!-- Icon Trash -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
    </tbody>
</table>
@endsection
