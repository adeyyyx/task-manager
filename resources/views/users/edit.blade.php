@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2" required>
        </div>

        <!-- Email -->
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2" required>
        </div>

        <!-- Role -->
        <div>
            <label class="block font-medium">Role</label>
            <select name="role" class="w-full border rounded p-2">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <!-- Password (opsional) -->
        <div>
            <label class="block font-medium">Password (Kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="w-full border rounded p-2">
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
        </div>
    </form>
</div>
@endsection
