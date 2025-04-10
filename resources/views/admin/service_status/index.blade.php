<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .fixed-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 1000px;
            max-width: 100%;
        }
    </style>
</head>
<body class="bg-light">

<!-- 🔹 HEADER -->
<header class="bg-success text-white fixed-top shadow-sm">
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center ps-3">
            <h3 class="m-0">
                <i class="fa-solid fa-store"></i> ARIF - MOTOR
            </h3>
        </div>
    </div>
</header>

<!-- 🔙 TOMBOL KEMBALI -->
<div class="position-absolute mt-5 ms-3" style="top: 70px;">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<!-- 🔹 CARD DI TENGAH -->
<div class="fixed-center">
    <div class="card p-4 shadow">
        <h2 class="text-center text-success mb-4">
            <i class="fa-solid fa-tools"></i> Kelola Status Service
        </h2>

        <!-- ✅ ALERT -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- 📋 TABEL -->
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Service</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- DATA DUMMY --}}
                    <tr>
                        <td>1</td>
                        <td>Tiara Ainul Zannah</td>
                        <td>Ganti Oli</td>
                        <td><span class="badge bg-success">Selesai</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-pen-to-square"></i> Ubah Status
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tiara Ainul Zannah</td>
                        <td>Service Rutin</td>
                        <td><span class="badge bg-warning text-dark">Diproses</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-pen-to-square"></i> Ubah Status
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- 🔻 FOOTER -->
<footer class="bg-success text-white text-center py-3 fixed-bottom">
    <p class="mb-0">&copy; 2025 ARIF-MOTOR | kelompok 5</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
