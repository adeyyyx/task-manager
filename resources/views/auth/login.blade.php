<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TodoList</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded shadow w-96">
        <h1 class="text-xl font-bold mb-4">Login</h1>
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email" class="border p-2 w-full">
            <input type="password" name="password" placeholder="Password" class="border p-2 w-full">
            <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Login</button>
        </form>

        @if($errors->any())
            <div class="mt-4 text-red-500">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</body>
</html>
