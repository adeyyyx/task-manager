@extends('layouts.app')

@section('title', 'Tambah Project')

@section('content')
<form method="POST" action="{{ route('projects.store') }}" class="space-y-4">
    @csrf
    <input type="text" name="name" placeholder="Nama Project" class="border p-2 w-full">
    <textarea name="description" placeholder="Deskripsi Project" class="border p-2 w-full"></textarea>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
