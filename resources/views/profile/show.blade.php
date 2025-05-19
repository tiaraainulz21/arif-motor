@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <h3 class="text-center">PROFIL SAYA</h3>
        
        <div class="d-flex justify-content-center">
            <div class="card w-50 p-4 shadow">
                <div class="text-center">
                    <h5 class="mt-2">{{ $user['username'] }}</h5>
                </div>
                
                <div class="mt-3">
                    <label class="fw-bold">Nama</label>
                    <input type="text" class="form-control" value="{{ $customer['name'] }}" readonly>

                    <label class="fw-bold mt-2">Alamat</label>
                    <input type="text" class="form-control" value="{{ $customer['address'] }}" readonly>

                    <label class="fw-bold mt-2">No. HP</label>
                    <input type="text" class="form-control" value="{{ $customer['phone'] }}" readonly>

                    <label class="fw-bold mt-2">Jenis Kelamin</label>
                    <input type="text" class="form-control" value="{{ $customer['gender'] }}" readonly>

                    <label class="fw-bold mt-2">Email</label>
                    <input type="text" class="form-control" value="{{ $user['email'] }}" readonly>

                    <a href="{{ route('profile.edit') }}" class="btn btn-success mt-3 w-100">Ubah</a>
                </div>
            </div>
        </div>
    </div>
@endsection