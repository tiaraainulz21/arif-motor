<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | ARIF MOTOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="text-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <div class="text-center mt-5">
        <h1 class="fw-bold text-success">Selamat Datang di Dashboard</h1>
        <p class="lead">Halo, {{ Auth::user()->name }}!</p>
        <hr>
        <p>Ini adalah halaman utama setelah login. Dari sini kamu bisa mengakses menu pelanggan, produk, atau lainnya.</p>
    </div>
</div>

</body>
</html>
