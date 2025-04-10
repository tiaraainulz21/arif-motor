@extends('layouts.app')

@section('content')
<style>
    .pesanan-container {
    width: 90%;
    margin: 20px auto;
}

.pesanan-item {
    background: white;
    display: flex;
    align-items: center;
    padding: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
}

.pesanan-item img {
    width: 100px;
    height: 100px;
    margin-right: 20px;
}

.pesanan-detail {
    flex: 1;
}

.pesanan-harga {
    text-align: right;
}

.pesanan-harga h4 {
    color: rgb(0, 0, 0);
    font-size: 18px;
}
</style>
<div class="pesanan-container">
    @foreach ($pesanan as $item)
    <div class="pesanan-item">
        <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['nama'] }}">
        <div class="pesanan-detail">
            <h3>{{ $item['nama'] }}</h3>
            <p>X {{ $item['jumlah'] }}</p>
        </div>
        <div class="pesanan-harga">
            <p>Rp.{{ number_format($item['harga'], 0, ',', '.') }}</p>
            <h4>Total Pesanan: Rp.{{ number_format($item['total'], 0, ',', '.') }}</h4>
        </div>
    </div>
    @endforeach
</div>
@endsection
