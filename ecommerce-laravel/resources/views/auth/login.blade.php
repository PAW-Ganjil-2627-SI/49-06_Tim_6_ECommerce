<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce UMKM</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6f8;
            color: #333;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            color: #1016de;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 28px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 7px;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input:focus {
            outline: 2px solid #c7c9ff;
            border-color: #1016de;
        }

        .field {
            margin-bottom: 18px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        .remember label {
            margin: 0;
            font-weight: normal;
        }

        .button {
            width: 100%;
            padding: 12px;
            background: #1016de;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .button:hover {
            background: #080db5;
        }

        .forgot {
            display: block;
            text-align: right;
            font-size: 13px;
            color: #1016de;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .register {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: #666;
        }

        .register a {
            color: #1016de;
            text-decoration: none;
            font-weight: bold;
        }

        .status {
            background: #e8f5e9;
            color: #23743b;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 16px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo">UMKM Store</div>
        <div class="subtitle">Silakan login ke akun Anda</div>

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label for="email">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email Anda"
                    required
                    autofocus
                    autocomplete="username"
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="Masukkan password Anda"
                    required
                    autocomplete="current-password"
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember">
                <input id="remember" type="checkbox" name="remember">
                <label for="remember">Ingat saya</label>
            </div>

            @if (Route::has('password.request'))
                <a class="forgot" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif

            <button type="submit" class="button">Login</button>
        </form>

        <div class="register">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>
