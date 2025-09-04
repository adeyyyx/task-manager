@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<form method="POST" action="{{ route('projects.update',$project) }}" class="space-y-4">
    @csrf @method('PUT')
    <input type="text" name="name" value="{{ $project->name }}" class="border p-2 w-full">
    <textarea name="description" class="border p-2 w-full">{{ $project->description }}</textarea>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
