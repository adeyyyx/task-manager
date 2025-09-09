@extends('layouts.app')

@section('title', 'Kelola Project')

@section('content')
<a href="{{ route('projects.create') }}" class="bg-green-500 text-white px-3 py-1 rounded shadow transition-all duration-200 hover:bg-green-600 hover:scale-105 ">Tambah Project</a>

<div class="overflow-x-auto mt-4">
    <table class="min-w-full bg-white rounded-lg shadow">
        <thead>
            <tr class="bg-blue-100 text-blue-900">
                <th class="px-6 py-3 text-left font-semibold">Nama</th>
                <th class="px-6 py-3 text-left font-semibold">Deskripsi</th>
                <th class="px-6 py-3 text-left font-semibold">Dibuat Oleh</th>
                <th class="px-6 py-3 text-center font-semibold">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr class="border-b hover:bg-blue-50 transition">
                <td class="px-6 py-3">{{ $project->name }}</td>
                <td class="px-6 py-3">{{ $project->description }}</td>
                <td class="px-6 py-3">{{ $project->creator->name ?? '-' }}</td>
                <td class="px-6 py-3 flex justify-center items-center gap-2">
                    <a href="{{ route('projects.edit',$project) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded shadow transition-all duration-200 hover:bg-yellow-600 hover:scale-105 flex items-center gap-1">
                        <!-- Icon Edit -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m2 2H7v-4h4z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('projects.destroy',$project) }}" method="POST" class="inline">
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
</div>
@endsection
