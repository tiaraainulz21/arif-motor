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

<!-- 🔹 CARD DI TENGAH -->
<div class="fixed-center">
    <div class="card p-4 shadow">

        <!-- 🔙 TOMBOL DAN JUDUL -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            <h2 class="text-success m-0 text-center">
                <i class="fa-solid fa-tools"></i> Kelola Status Service
            </h2>
            <div style="width: 150px;"></div> <!-- Spacer supaya judul tetap center -->
        </div>

        <!-- 🔍 SEARCH BAR -->
        <div class="d-flex justify-content-end mb-3">
            <form action="{{ route('admin.service_status.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2"
                       placeholder="Cari nama pelanggan..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-success btn-sm">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.service_status.index') }}" class="btn btn-outline-secondary btn-sm ms-2">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </form>
        </div>

        <!-- ALERT -->
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
                        <th>Resume</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $index => $service)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->type }}</td>
                            <td>
                                <a href="{{ route('service.resume', $service->id) }}" class="btn btn-sm text-white" style="background-color: rgb(0, 0, 0);">
                                    <u>Lihat Resume</u>
                                </a>
                            </td>
                            <td>
                                @if ($service->status === 'Selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif ($service->status === 'Diproses')
                                    <span class="badge bg-warning text-dark">Diproses</span>
                                @else
                                    <span class="badge bg-secondary">Menunggu</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.service_status.edit', $service->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i> Ubah Status
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-muted">Tidak ada data service.</td>
                        </tr>
                    @endforelse
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
