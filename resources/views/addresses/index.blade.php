@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Alamat</h4>

    {{-- Tombol Tambah Alamat, membawa param return_to agar bisa kembali ke ringkasan order --}}
    <a href="{{ route('addresses.create', ['return_to' => request()->input('return_to', url()->previous())]) }}" class="btn btn-success mb-3">
        Tambah Alamat
    </a>

    @foreach ($addresses as $address)
        <div 
            class="card mb-2 p-3" 
            style="cursor:pointer;" 
            onclick="selectAddress({{ $address->id }})"
        >
            <strong>{{ $address->recipient_name }}</strong> <br>
            {{ $address->phone }} <br>
            {{ $address->address }} <br>
            @if($address->is_default)
                <span class="badge bg-success">Utama</span>
            @endif
        </div>
    @endforeach
</div>

<script>
    function selectAddress(addressId) {
        // Ambil URL return_to dari query param (sudah di-encode dengan aman)
        const returnTo = @json(request()->input('return_to', route('order.summary', ['id' => 0])));

        // Buat objek URL dari return_to
        const url = new URL(returnTo, window.location.origin);

        // Tambahkan query param selected_address_id ke URL
        url.searchParams.set('selected_address_id', addressId);

        // Arahkan pengguna ke URL baru
        window.location.href = url.toString();
    }
</script>
@endsection
