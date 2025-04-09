<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arif Motor</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body>
    <div class="navbar">
        <h1>ARIF MOTOR</h1>
        <input type="text" placeholder="Cari SparePart">
        <div class="icons">
            <!-- Ikon Keranjang -->
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
            </span>

            <!-- Ikon Profil dengan Bubble Menu -->
            <div class="relative" x-data="{ open: false }">
                <!-- Icon Profil -->
                <button @click="open = !open" class="profile-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </button>
            
                <!-- Bubble Menu -->
                <div x-show="open" @click.away="open = false" class="bubble-menu">
                    <div class="bubble-arrow"></div>
                    <a href="{{ route('customer.profile') }}">Profil Saya</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Keluar</button>
                    </form>
                </div>
            </div>            
        </div>
    </div>

    <div class="menu">
        <a href="{{ route('beranda') }}" class="active">Beranda</a>
        <a href="{{ route('struk.pesanan') }}" class="active">Pesanan</a>
        <a href="{{ route('notifikasi') }}" class="active">Notifikasi</a>
        <a href="#" class="active">Chat</a>
        <a href="{{ route('status') }}" class="active">Service</a>
    </div>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
