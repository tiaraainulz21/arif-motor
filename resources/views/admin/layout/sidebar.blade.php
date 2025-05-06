<aside class="main-sidebar" style="background-color: #074F0A; min-height: 100vh;">
    <!-- Brand Logo -->
    <div class="d-flex justify-content-between align-items-center px-3 py-3">
        <strong class="text-white fw-bold">ARIF MOTOR</strong>
        <a href="#" class="text-white">
            <i class="bi bi-arrow-left"></i>
        </a>
    </div>

    <!-- css Menu-->
    <div class="sidebar px-2">
        <nav class="mt-2 d-grid gap-2">
            <style>
            .sidebar-link {
                background-color: #0A630E;
                border: 1px solid transparent;
                transition: 0.3s;
                }

            .sidebar-link:hover,
            .sidebar-link:focus {
                border-color: #ffffff;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
                }

            .sidebar-link.active {
                background-color: #0a5a0d;
                border: 2px solid #ffffff;
                box-shadow: 0 0 5px #ffffff;
                }
            </style>

            <!-- Sidebar menu -->
            <a href="#" class="btn text-white fw-bold w-100 mb-2 sidebar-link">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="#" class="btn text-white fw-bold w-100 mb-2 sidebar-link d-inline-flex justify-content-center align-items-center" style="justify-content: center; gap: 0.2rem;">
                <span class="material-icons" style="font-size: 25px; line-height: 1;">groups</span>
                Kelola Data Pelanggan
            </a>
            <a href="#" class="btn text-white fw-bold w-100 mb-2 sidebar-link">
                <i class="bi bi-box2-fill"></i> Kelola Produk
            </a>
            <!-- <a href="#" class="btn text-white fw-bold w-100 mb-2 sidebar-link">
                <i class="bi bi-cart3"></i> Kelola Data Pesanan
            </a> -->
            <a href="{{ route('Kelola Layanan Service') }}" class="btn text-white fw-bold w-100 mb-2 sidebar-link">
                <i class="bi bi-tools me-2"></i> Kelola Layanan Service
            </a>
            <a href="#" class="btn text-white fw-bold w-100 mb-2 sidebar-link">
                <i class="bi bi-chat-dots-fill"></i> Kelola Chat
            </a>
            <a href="#" class="btn text-white fw-bold w-100 mb-2 sidebar-link">
                <i class="bi bi-bell-fill me-2"></i> Kelola Notifikasi
            </a>
        </nav>
    </div>
</aside>
