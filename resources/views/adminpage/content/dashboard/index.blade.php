<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>

    <!-- Bootstrap CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body style="background-color: #e5f0e5; overflow-x: hidden;">


    <!-- Sidebar -->
    <div class="d-flex">
        <div id="sidebar" class="bg-success text-white p-3 position-fixed top-0 start-0 vh-100" 
            style="width: 260px; transform: translateX(-100%); transition: transform 0.3s; z-index: 1060;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h5 fw-bold">ARIF-MOTOR</h2>
                <button id="closeSidebar" class="btn btn-sm btn-light text-success">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
            </div>
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-success text-start w-100">
                        <i class="fa-solid fa-users me-2"></i> Kelola Pelanggan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-success text-start w-100">
                        <i class="fa-solid fa-box me-2"></i> Kelola Produk
                    </a>                                     
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.service_status.index') }}" class="btn btn-success text-start w-100">
                        <i class="fa-solid fa-tools me-2"></i> Kelola Status Service
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-success text-start w-100">
                        <i class="fa-solid fa-bell me-2"></i> Kelola Notifikasi
                    </a>                    
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.pesanan.index') }}" class="btn btn-success text-start w-100">
                        <i class="fa-solid fa-clipboard-list me-2"></i> Kelola Pesanan
                    </a>
                </li>
            </ul>

        </div>

        <!-- Main Content -->
        <div class="flex-grow-1" id="mainContent" style="margin-left: 0;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-success px-3 position-sticky top-0" style="z-index: 1050;">
                <button id="toggleSidebar" class="btn btn-outline-light me-2">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="navbar-brand fw-bold">Dashboard Admin</div>
                <div class="ms-auto">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="fa-solid fa-sign-out-alt me-1"></i> Logout
                    </button>
                </div>
            </nav>

            <!-- Dashboard Content in Center -->
            <div class="container-fluid d-flex align-items-center justify-content-center" style="height: calc(100vh - 56px - 48px); padding-top: 56px;">
                <div class="card shadow text-center w-100" style="max-width: 900px;">
                    <div class="card-body">
                        <h2 class="card-title text-success fw-bold">Selamat Datang <strong>Admin</strong>!</h2>
                        <p class="mt-3 fs-5 text-muted">Ini adalah halaman dashboard untuk mengelola data pelanggan, produk, pesanan, dan lainnya.</p>

                        <div class="row mt-4 justify-content-center">
                            <div class="col-md-3">
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-body">
                                        <i class="fa-solid fa-users fa-2x"></i>
                                        <p class="mt-2 mb-1">Total Pelanggan</p>
                                        <h3 class="fw-bold">{{ $totalCustomers }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-body">
                                        <i class="fa-solid fa-box fa-2x"></i>
                                        <p class="mt-2 mb-1">Total Produk</p>
                                        <h3 class="fw-bold">{{ $totalProducts }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-body">
                                        <i class="fa-solid fa-clipboard-list fa-2x"></i>
                                        <p class="mt-2 mb-1">Total Pesanan</p>
                                        <h3 class="fw-bold">{{ $totalTransactions }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-body">
                                        <i class="fa-solid fa-wrench fa-2x"></i>
                                        <p class="mt-2 mb-1">Total Service</p>
                                        <h3 class="fw-bold">2</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="card text-white bg-success mb-3 shadow">
                                    <div class="card-body">
                                        <i class="fa-solid fa-bell fa-2x"></i>
                                        <p class="mt-2 mb-1">Total Notifikasi</p>
                                        <h3 class="fw-bold">{{ $totalNotifications }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body text-center">
                    <p class="fs-5">Apakah Anda yakin ingin logout?</p>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    
                    <a href="{{ route('logout') }}"
                        class="btn btn-danger"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- 🔻 FOOTER -->
    <footer class="bg-success text-white text-center py-3 fixed-bottom">
        <p class="mb-0">&copy; 2025 ARIF-MOTOR | kelompok 6</p>
    </footer>

    <!-- Bootstrap JS & Sidebar Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const sidebar = document.getElementById("sidebar");
        const toggleSidebar = document.getElementById("toggleSidebar");
        const closeSidebar = document.getElementById("closeSidebar");

        toggleSidebar.addEventListener("click", () => {
            sidebar.style.transform = "translateX(0)";
        });

        closeSidebar.addEventListener("click", () => {
            sidebar.style.transform = "translateX(-100%)";
        });

        document.addEventListener("click", function(event) {
            if (!sidebar.contains(event.target) && !toggleSidebar.contains(event.target)) {
                sidebar.style.transform = "translateX(-100%)";
            }
        });
    </script>
</body>
</html>
