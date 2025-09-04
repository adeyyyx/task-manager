@extends('layouts.app')

@section('title', 'Kelola Project')

@section('content')
<a href="{{ route('projects.create') }}" class="bg-green-500 text-white px-3 py-1 rounded">Tambah Project</a>

<table class="table-auto w-full mt-4">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Deskripsi</th>
            <th class="px-4 py-2">Dibuat Oleh</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $project->name }}</td>
            <td class="px-4 py-2">{{ $project->description }}</td>
            <td class="px-4 py-2">{{ $project->creator->name ?? '-' }}</td>
            <td class="px-4 py-2 space-x-2">
                <a href="{{ route('projects.edit',$project) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                <form action="{{ route('projects.destroy',$project) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
