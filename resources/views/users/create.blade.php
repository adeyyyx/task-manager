@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Tambah User</h1>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nama -->
        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <!-- Email -->
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" required>
        </div>

        <!-- Password -->
        <div>
            <label class="block font-medium">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2" required>
        </div>

        <!-- Role -->
        <div>
            <label class="block font-medium">Role</label>
            <select name="role" class="w-full border rounded p-2">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between">
            <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
