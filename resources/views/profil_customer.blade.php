@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>PROFIL SAYA</h2>
    <div class="profile-info">
        <p><strong>Nama:</strong> {{ $customer->name }}</p>
        <p><strong>Alamat:</strong> {{ $customer->address }}</p>
        <p><strong>No. HP:</strong> {{ $customer->phone }}</p>
        <p><strong>Jenis Kelamin:</strong> {{ $customer->gender }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
    
@endsection
