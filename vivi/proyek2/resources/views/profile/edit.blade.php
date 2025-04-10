<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Profil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-success p-3">
        <a class="navbar-brand mx-3 text-white" href="#">ARIF MOTOR</a>
        <div>
            <button class="btn btn-light" onclick="window.location.href='{{ route('cart.index') }}'">
                <i class="fa fa-shopping-cart"></i> 
            </button>
            <button class="btn btn-light" onclick="window.location.href='{{ route('profile.show') }}'">
                <i class="fa fa-user"></i>
            </button>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center">UBAH PROFIL</h3>
        
        <div class="d-flex justify-content-center">
            <div class="card w-50 p-4 shadow">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf

                    <label class="fw-bold">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user['username'] }}">

                    <label class="fw-bold mt-2">Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">

                    <label class="fw-bold mt-2">Alamat</label>
                    <input type="text" class="form-control" name="address" value="{{ $user['address'] }}">

                    <label class="fw-bold mt-2">No. HP</label>
                    <input type="text" class="form-control" name="phone" value="{{ $user['phone'] }}">

                    <label class="fw-bold mt-2">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="gender" value="{{ $user['gender'] }}">

                    <label class="fw-bold mt-2">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user['email'] }}">

                    <button type="submit" class="btn btn-success mt-3 w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
