<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Modul Ekspedisi Kirim')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <header>
        <h1>Ekspedisi Kirim</h1>    
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>Modul C / Modul Ekspedisi Kirim</p>
        <p>Hazel Arya Syawalinov - 102022500324 - SI4906 - Kelompok 6</p>
    </footer>
</body>
</html>