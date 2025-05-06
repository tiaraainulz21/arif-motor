<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Notifikasi | ARIF-MOTOR</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-dark bg-success shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-bell"></i> Form Edit Notifikasi
        </a>
    </div>
</nav>

<!-- Content -->
<div class="container flex-grow-1 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm w-100" style="max-width: 800px;">
        <div class="card-body">
            <h5 class="text-success text-center fw-bold mb-3">
                <i class="bi bi-bell"></i> Form Edit Notifikasi
            </h5>
            <hr class="mb-4">

            {{-- Error Handling --}}
            @if ($errors->any())
                <div class="alert alert-danger small">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('admin.notifikasi.update', $notifikasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Tabel Notifikasi --}}
                <table class="table table-sm table-bordered">
                    <tbody>
                        <tr>
                            <td><strong>Penerima (Customer)</strong></td>
                            <td>
                                <select name="user_id" id="user_id" class="form-select form-select-sm" required>
                                    <option value="">-- Pilih Customer --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $notifikasi->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->customer->name ?? $user->username }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><strong>Judul</strong></td>
                            <td><input type="text" name="title" id="title" class="form-control form-control-sm" value="{{ old('title', $notifikasi->title) }}" required></td>
                        </tr>

                        <tr>
                            <td><strong>Pesan</strong></td>
                            <td><textarea name="message" id="message" class="form-control form-control-sm" rows="4" required>{{ old('message', $notifikasi->message) }}</textarea></td>
                        </tr>

                        <tr>
                            <td><strong>Tanggal</strong></td>
                            <td><input type="date" name="date" id="date" class="form-control form-control-sm" value="{{ old('date', \Carbon\Carbon::parse($notifikasi->date)->format('Y-m-d')) }}" required></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Tombol -->
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-success text-white text-center py-2 mt-auto">
    <small>&copy; 2025 ARIF-MOTOR | Kelompok 5</small>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
