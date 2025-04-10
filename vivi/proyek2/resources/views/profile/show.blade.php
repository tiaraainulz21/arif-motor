<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
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
        <h3 class="text-center">PROFIL SAYA</h3>
        
        <div class="d-flex justify-content-center">
            <div class="card w-50 p-4 shadow">
                <div class="text-center">
                    <img src="https://via.placeholder.com/50" alt="User" class="rounded-circle">
                    <h5 class="mt-2">{{ $user['username'] }}</h5>
                </div>
                
                <div class="mt-3">
                    <label class="fw-bold">Nama</label>
                    <input type="text" class="form-control" value="{{ $user['name'] }}" readonly>

                    <label class="fw-bold mt-2">Alamat</label>
                    <input type="text" class="form-control" value="{{ $user['address'] }}" readonly>

                    <label class="fw-bold mt-2">No. HP</label>
                    <input type="text" class="form-control" value="{{ $user['phone'] }}" readonly>

                    <label class="fw-bold mt-2">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{ $user['gender'] }}" readonly>

                    <label class="fw-bold mt-2">Email</label>
                    <input type="text" class="form-control" value="{{ $user['email'] }}" readonly>

                    <a href="{{ route('profile.edit') }}" class="btn btn-success mt-3 w-100">Ubah</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
