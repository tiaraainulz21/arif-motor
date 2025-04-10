@extends('layouts.app')
@section('content')
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

@endsection()