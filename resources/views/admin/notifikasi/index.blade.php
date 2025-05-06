<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Notifikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Header -->
    <div class="bg-success text-white py-2 px-3 fs-6 fw-bold">ARIF-M</div>

    <!-- Main Content -->
    <div class="container d-flex justify-content-center align-items-center flex-grow-1">
        <div class="card p-3 shadow-sm w-100" style="max-width: 960px;">
            <h6 class="text-center text-success mb-3">
                <i class="fa-solid fa-bell"></i> Daftar Notifikasi
            </h6>

            <!-- Tombol Tambah & Form Pencarian -->
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

            <!-- Alert Sukses -->
            @if(session('success'))
                <div class="alert alert-success p-2 small">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle table-sm">
                    <thead class="table-success small">
                        <tr>
                            <th>No</th>
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
                                <td colspan="5" class="text-muted">Belum ada notifikasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-2">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-1 small mt-auto">
        ©2025 | ARIF-M | KELOMPOK 5
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
