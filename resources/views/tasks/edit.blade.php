@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<form method="POST" action="{{ route('tasks.update',$task) }}" class="space-y-4">
    @csrf @method('PUT')
    <input type="text" name="title" value="{{ $task->title }}" class="border p-2 w-full">
    <textarea name="description" class="border p-2 w-full">{{ $task->description }}</textarea>

    <select name="project_id" class="border p-2 w-full">
        @foreach($projects as $project)
            <option value="{{ $project->project_id }}" @if($task->project_id == $project->project_id) selected @endif>
                {{ $project->name }}
            </option>
        @endforeach
    </select>

    <select name="assigned_to" class="border p-2 w-full">
        @foreach($users as $user)
            <option value="{{ $user->id }}" @if($task->assigned_to == $user->id) selected @endif>
                {{ $user->name }}
            </option>
        @endforeach
    </select>

    <button class="bg-blue-600 text-white px-4 py-2 rounded shadow transition-all duration-200 hover:bg-blue-700 hover:scale-105 flex items-center gap-1">Update</button>
</form>
@endsection
