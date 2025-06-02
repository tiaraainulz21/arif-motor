<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            padding-top: 100px;
            padding-bottom: 80px;
            background-color: #f8f9fa;
        }

        .content-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .btn-kembali-dalam {
            position: absolute;
            top: 16px;
            left: 16px;
            z-index: 10;
        }
    </style>
</head>
<body>

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

<!-- 🔹 MAIN CONTENT -->
<main class="content-container px-3">
    <div class="card p-4 shadow position-relative">

        <!-- 🔙 Tombol Kembali di Dalam Card -->
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm btn-kembali-dalam">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
        </a>

        <h2 class="text-center text-success mb-4">
            <i class="fa-solid fa-box"></i> Daftar Produk
        </h2>

        <!-- 🔘 Tambah & 🔍 Pencarian -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Tambah Produk
            </a>

            <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2"
                       placeholder="Cari produk..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-success btn-sm">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm ms-2">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </form>
        </div>

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
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Tipe</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                     class="img-thumbnail w-50">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center gap-1">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm d-inline-flex align-items-center py-1 px-2"
                                   style="font-size: 0.8rem;">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="btn btn-danger btn-sm d-inline-flex align-items-center py-1 px-2"
                                        style="font-size: 0.8rem;">
                                        <i class="fa-solid fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada produk.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- 🔻 FOOTER -->
<footer class="bg-success text-white text-center py-3 fixed-bottom">
    <p class="mb-0">&copy; 2025 ARIF-MOTOR | kelompok 6</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
