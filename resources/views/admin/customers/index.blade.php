<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pelanggan | ARIF-MOTOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            padding-top: 80px;
            padding-bottom: 70px;
            background-color: #f8f9fa;
        }
        .content-wrapper {
            max-width: 1000px;
            margin: auto;
            padding: 0 15px;
        }
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 1;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">ARIF-MOTOR</a>
        </div>
    </nav>

    <!-- Container -->
    <div class="d-flex justify-content-center align-items-center flex-grow-1" style="margin-top: 80px;">
        <div class="col-md-10">
            <div class="card shadow-lg p-4">

                <!-- Header Card: Title + Kembali + Search -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>

                    <h3 class="text-success m-0">
                        <i class="fa-solid fa-users"></i> Daftar Pelanggan
                    </h3>

                    <!-- Search Form -->
                    <form action="{{ route('admin.customers.index') }}" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Cari pelanggan..." aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>

                <!-- Flash Message -->
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                <!-- Tabel Pelanggan -->
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customers as $index => $customer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ ucfirst($customer->gender) }}</td>
                                <td>{{ $customer->user->email ?? '-' }}</td>
                                <td class="align-middle text-center" style="white-space: nowrap; width: 150px;">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-sm btn-warning d-flex align-items-center">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center">
                                                <i class="fa-solid fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada customer terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</nav>

        <!-- Pagination (opsional jika pakai paginate) -->
        @if(method_exists($customers, 'links'))
            <div class="mt-3">
                {{ $customers->links() }}
            </div>
        @endif

    </div>
</main>

<!-- 🔻 Footer -->
<footer class="bg-success text-white text-center py-3 fixed-bottom">
    © 2025 ARIF-MOTOR | Kelompok 6
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
