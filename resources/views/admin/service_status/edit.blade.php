<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Status Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-success">
        <i class="fa-solid fa-pen-to-square"></i> Ubah Status Service
    </h2>

    <!-- ✅ Form Edit Status -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.service_status.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- 🔒 Nama (readonly) -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" value="{{ $service->name }}" disabled>
                </div>

                <!-- 🔒 Jenis Service (readonly) -->
                <div class="mb-3">
                    <label for="type" class="form-label">Jenis Service</label>
                    <input type="text" class="form-control" value="{{ $service->type }}" disabled>
                </div>

                <!-- 🔽 Status (editable) -->
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="Diproses" {{ $service->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="Selesai" {{ $service->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <!-- ✅ Tombol -->
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="{{ route('admin.service_status.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<!-- FontAwesome & Bootstrap JS -->
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
