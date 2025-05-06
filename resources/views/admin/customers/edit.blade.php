<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan | ARIF-MOTOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        body {
            padding-top: 70px; /* beri ruang untuk navbar fixed-top */
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">ARIF-MOTOR</a>
        </div>
    </nav>

    <!-- Kontainer Tengah -->
    <div class="d-flex justify-content-center align-items-center flex-grow-1">
        <div class="col-md-6">
            <div class="card shadow-lg p-4">
                <h3 class="mb-4 text-success text-center">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit Data Pelanggan
                </h3>
                

                <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $customer->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required>{{ old('address', $customer->address) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="laki-laki" {{ old('gender', $customer->gender) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{ old('gender', $customer->gender) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-success text-white text-center py-3 mt-auto">
        © 2025 ARIF-MOTOR | Kelompok 5
    </footer>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
