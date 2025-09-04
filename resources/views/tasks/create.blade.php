@extends('layouts.app')

@section('title', 'Tambah Task')

@section('content')
<form method="POST" action="{{ route('tasks.store') }}" class="space-y-4">
    @csrf
    <input type="text" name="title" placeholder="Judul Task" class="border p-2 w-full">
    <textarea name="description" placeholder="Deskripsi Task" class="border p-2 w-full"></textarea>

    <select name="project_id" class="border p-2 w-full">
        @foreach($projects as $project)
            <option value="{{ $project->project_id }}">{{ $project->name }}</option>
        @endforeach
    </select>

    <select name="assigned_to" class="border p-2 w-full">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
