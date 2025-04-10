@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>PROFIL SAYA</h2>
    <form action="{{ route('customer.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $customer->alamat }}" required>
        </div>
        <div class="form-group">
            <label>No. HP</label>
            <input type="text" name="no_hp" value="{{ $customer->no_hp }}" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" required>
                <option value="Laki-laki" {{ $customer->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $customer->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
