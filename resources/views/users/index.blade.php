@extends('layouts.app')

@section('content')
<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Daftar User</h1>

    <a href="{{ route('users.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded">Tambah User</a>

    <table class="mt-4 border w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Role</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="p-2 border">{{ $user->id }}</td>
                <td class="p-2 border">{{ $user->name }}</td>
                <td class="p-2 border">{{ $user->email }}</td>
                <td class="p-2 border">{{ $user->role }}</td>
                <td class="p-2 border">
                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500">Edit</a> |
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
