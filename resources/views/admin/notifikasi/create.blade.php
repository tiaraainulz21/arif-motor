<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Notifikasi | ARIF-MOTOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">ARIF-MOTOR</a>
        </div>
    </nav>

    <!-- Container -->
    <div class="d-flex justify-content-center align-items-center flex-grow-1" style="margin-top: 80px;">
        <div class="col-md-8">
            <div class="card shadow-lg p-4">

                <!-- Header Card: Title + Kembali -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Notifikasi
                    </a>

                    <h3 class="text-success m-0">
                        <i class="fa-solid fa-bell"></i> Buat Notifikasi Baru
                    </h3>
                </div>

                <!-- Flash Message -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                            <!-- Formulir Buat Notifikasi -->
                <form method="POST" action="{{ route('admin.notifikasi.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="form-label">Pilih User</label>
                        <select name="user_id" id="user_id" class="form-select" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->customer->name ?? $user->username }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Notifikasi</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul notifikasi" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan Notifikasi</label>
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Masukkan pesan notifikasi" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Notifikasi</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Notifikasi
                    </button>
                </form>


            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3 mt-auto">
        © 2025 ARIF-MOTOR | Kelompok 6
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
