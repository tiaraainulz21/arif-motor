<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arif Motor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="container">
    <div class="left-section">
        <h1>ARIF MOTOR</h1>
        <p>| Belanja SparePart dan Layanan Service Online</p>
    </div>
    <div class="right-section">
        <h2>MASUK</h2>

        {{-- Menampilkan pesan error jika login gagal --}}
        @if ($errors->any())
            <div class="alert" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border: 1px solid #f5c6cb; border-radius: 5px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login_post') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
            <a href="{{ route('register') }}">Daftar Akun</a>
        </form>
    </div>
</div>
</body>
</html>
