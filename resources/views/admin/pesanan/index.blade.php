<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan</title>
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
            width: 900px;
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
                <i class="fa-solid fa-list"></i> DAFTAR PESANAN
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
            <i class="fa-solid fa-clipboard-list"></i> Daftar Pesanan
        </h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-success">
                    <tr>
                        <th>Customer</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>
                                {{ $transaction->customer->name ?? '-' }} <br>
                                {{ $transaction->customer->address ?? '-' }}
                            </td>
                            <td>
                                @foreach($transaction->details as $detail)
                                    {{ $detail->product->name ?? 'Produk tidak ditemukan' }} <br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($transaction->details as $detail)
                                    {{ $detail->qty }} <br>
                                @endforeach
                            </td>
                            <td>Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                            <td>
                                <!-- ✅ DROPDOWN STATUS -->
                        <div class="dropdown">
                            <button class="btn btn-outline-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $transaction->status }}
                            </button>
                            <div class="dropdown-menu p-2 shadow-sm" style="min-width: 160px;">
                                <form action="{{ route('admin.pesanan.update', $transaction->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="Diproses">
                                    <button type="submit" class="dropdown-item">Diproses</button>
                                </form>
                                <form action="{{ route('admin.pesanan.update', $transaction->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="Dikemas">
                                    <button type="submit" class="dropdown-item">Dikemas</button>
                                </form>
                                <form action="{{ route('admin.pesanan.update', $transaction->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="Diterima">
                                    <button type="submit" class="dropdown-item">Diterima</button>
                                </form>
                            </div>
                        </div>

                                </div>
                            </td>
                        </tr>`
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- 🔻 FOOTER -->
<footer class="bg-success text-white text-center py-3 fixed-bottom">
    <p class="mb-0">&copy; 2025 ARIF-MOTOR | kelompok 6</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
