<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Notifikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <style>
        body {
            padding-top: 56px;
            padding-bottom: 60px;
            background-color: #f8f9fa;
        }

        .custom-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background-color: #198754;
            color: white;
            font-weight: 700;
            padding: 0.5rem 1rem;
        }

        .custom-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #198754;
            color: white;
            text-align: center;
            padding: 0.25rem 0;
            font-size: 0.8rem;
        }

        .container-main {
            padding-top: 1rem;
            padding-bottom: 4rem;
        }

        .table-wrapper {
            max-height: 450px;
            overflow-y: auto;
        }

        /* Container header for button + title */
        .header-row {
            display: flex;
            align-items: center;
            position: relative;
            margin-bottom: 1rem;
        }

        /* Kembali button di kiri */
        .back-btn {
            position: absolute;
            left: 0;
        }

        /* Judul di tengah, dengan lebar 100% agar bisa center */
        .header-title {
            width: 100%;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
            color: #198754;
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header -->
    <div class="custom-header">ARIF-MOTOR</div>

    <!-- Main Content -->
    <div class="container container-main d-flex justify-content-center align-items-start flex-grow-1 mt-2">
        <div class="card p-3 shadow-sm w-100" style="max-width: 960px;">

            <!-- Tombol Kembali di kiri atas & Judul di tengah -->
            <div class="header-row">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm back-btn">
                    <i class="fa fa-arrow-left"></i> Kembali ke Dashboard
                </a>
                <h6 class="header-title">
                    <i class="fa-solid fa-bell"></i> Daftar Notifikasi
                </h6>
            </div>

            <!-- Tombol Tambah & Form Search -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <a href="{{ route('admin.notifikasi.create') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Tambah Notifikasi
                </a>
                <form action="{{ route('admin.notifikasi.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm me-2"
                           placeholder="Cari notifikasi..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-success btn-sm">
                        <i class="fa fa-search"></i>
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-outline-secondary btn-sm ms-2">
                            <i class="fa fa-rotate-left"></i>
                        </a>
                    @endif
                </form>
            </div>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success p-2 small">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Notifikasi -->
            <div class="table-wrapper table-responsive">
                <table class="table table-bordered text-center align-middle table-sm">
                    <thead class="table-success small">
                        <tr>
                            <th>No</th>
                            <th>Pengguna</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="small">
                        @forelse ($notifikasi as $index => $notification)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $notification->user->customer->name ?? $notification->user->username ?? '-' }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>{{ Str::limit($notification->message, 50) }}</td>
                                <td>{{ $notification->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.notifikasi.edit', $notification->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.notifikasi.destroy', $notification->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus notifikasi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted">Belum ada notifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="custom-footer">
        ©2025 | ARIF-MOTOR | KELOMPOK 6
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
