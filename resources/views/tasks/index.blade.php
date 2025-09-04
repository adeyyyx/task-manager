@extends('layouts.app')

@section('title', 'Kelola Task')

@section('content')
<a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-3 py-1 rounded">Tambah Task</a>

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
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('tasks.edit',$task) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                <form action="{{ route('tasks.destroy',$task) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
