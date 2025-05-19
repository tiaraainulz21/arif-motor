
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">ARIF MOTOR</a>
            <form action="{{ route('products.search') }}" method="GET" class="d-flex">
                <input id="searchInput"  class="form-control me-2" type="search" name="query" placeholder="Cari SparePart Motor..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
            <div class="icons">
                <!-- Ikon Keranjang -->
                <span style="display: flex; align-items:center;">
                    <a href="{{ route('cart.index') }}" class="profile-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                    </a>
                </span>
    
                <!-- Ikon Profil dengan Bubble Menu -->
                <div class="relative" x-data="{ open: false }" style="display: flex; align-items:center;">
                    <!-- Icon Profil -->
                    <a href="{{ route('profile.show') }}" class="profile-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                    </a>
                
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn" style="background: none; border: none; padding: 0;">
                            <i class="fa fa-sign-out" style="color: white; font-size:25px"></i>
                        </button>
                    </form>
                    
                </div>            
            </div>
        </div>
    </nav>

    <div class="menu">

        <a href="{{ route('beranda') }}" class="{{ request()->routeIs('beranda') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('transactions.index') }}" class="{{ request()->routeIs('transactions.index') ? 'active' : '' }}">Pesanan</a>
        <a href="{{ route('notifikasi') }}" class="{{ request()->routeIs('notifikasi') ? 'active' : '' }}">Notifikasi</a>
        <a href="https://wa.me/6283101455159" target="_blank">Chat</a>
        <a href="{{ route('status') }}" class="{{ request()->is('status') ? 'active' : '' }}">Service</a>

    </div>