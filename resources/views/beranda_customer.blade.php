@extends('layouts.app')

@section('content')
<style>
.container {
    text-align: center;
} */

.content h2 {
    color: darkgreen;
}

.product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.product {
    background: white;
    padding: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: left;
    width: 250px;
    border-radius: 10px;
}

.product img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}

.product p {
    margin: 5px 0;
    font-size: 14px;
}
.product .name {
    font-weight: bold;
    font-size: 16px;
}
</style>

<div class="content text-center">
    <h2>ARIF MOTOR</h2>
    <p>Selamat datang di platform belanja sparepart dan layanan service online</p>

    <div class="product-list">
        @foreach($products as $product)
            <div class="product">
                <img src="{{ asset ('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <p class="name">{{ $product->name }}</p>
                <p>Merk: {{ $product->brand }}</p>
                <p>Jenis: {{ $product->type }}</p>
                <p>Stok: {{ $product->stock }}</p>
                <p>Rp.{{ number_format($product->price, 0, ',', '.') }}</p>
                @if($product->description)
                    <p><em>{{ $product->description }}</em></p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
