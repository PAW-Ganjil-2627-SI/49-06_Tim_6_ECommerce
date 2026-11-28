<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        @if (session('success'))
            <div class="mb-4 bg-emerald-100 text-emerald-800 p-3 rounded-lg text-sm">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded-lg p-2 text-sm" required>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded-lg p-2 text-sm" required>
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-lg text-sm transition">Masuk</button>
        </form>

        <p class="text-center text-xs text-slate-500 mt-4">
            Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-600 font-medium">Daftar</a>
        </p>
    </div>
</body>
</html>