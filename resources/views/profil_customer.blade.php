@extends('layouts.nav')

@section('content')
<div class="form-container">
    <h2>PROFIL SAYA</h2>
    <div class="profile-info">
        <p><strong>Nama:</strong> {{ $customer->name }}</p>
        <p><strong>Alamat:</strong> {{ $customer->alamat }}</p>
        <p><strong>No. HP:</strong> {{ $customer->no_hp }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $customer->jenis_kelamin }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
    </div>
    <a href="{{ route('customer.edit') }}" class="btn btn-success">Ubah</a>
</div>
@endsection
