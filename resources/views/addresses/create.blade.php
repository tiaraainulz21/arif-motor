@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Tambah Alamat Baru</h4>

    <form action="{{ route('addresses.store') }}" method="POST">
        @csrf

        {{-- Tambahkan hidden input untuk membawa parameter return_to --}}
        <input type="hidden" name="return_to" value="{{ $returnTo ?? route('addresses.index') }}">

        <div class="mb-3">
            <label for="recipient_name" class="form-label">Nama Penerima</label>
            <input type="text" name="recipient_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">No. Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Alamat</button>
    </form>
</div>
@endsection
