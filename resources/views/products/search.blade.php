@extends('layouts.app')

@section('content')
<style>
.card-product {
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s ease;
    text-decoration: none;
    color: inherit;
}

.card-product:hover {
    transform: scale(1.02);
}

.card-product img {
    height: 200px;
    object-fit: contain;
    padding: 15px;
    background-color: #fff;
}

.card-product .card-body {
    padding: 15px;
}

.card-product .card-title {
    font-weight: bold;
    text-transform: lowercase;
    border-top: 2px solid #333;
    padding-top: 10px;
    margin-top: 10px;
}

.card-product .card-text {
    font-size: 14px;
}

.card-product .card-text.fst-italic {
    font-style: italic;
    margin-top: 10px;
    font-size: 13px;
}

a.card-link {
    text-decoration: none;
    color: inherit;
}
</style>

<div class="container mt-4">
    <h2 class="text-success mb-3">
        <i class="fa-solid fa-magnifying-glass"></i> Hasil Pencarian
    </h2>
    <p>Kamu mencari: <strong>{{ $query }}</strong></p>

    @if($products->count())
        <div class="row">
            @foreach($products as $product)
<<<<<<< HEAD
                <div class="col-md-4">
                    <a href="{{ route('product.showByName', $product->id) }}">
                        <div class="card shadow-sm">
                            <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text">Rp.{{ number_format($product['price'], 0, ',', '.') }}</p>
=======
                <div class="col-md-4 mb-4">
                    <!-- LINK dibungkus di seluruh card -->
                    <a href="{{ route('products.show', $product->id) }}" class="card-link">
                        <div class="card card-product h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize">{{ $product->name }}</h5>
                                <p class="card-text mb-1"><strong>Merk:</strong> {{ $product->brand }}</p>
                                <p class="card-text mb-1"><strong>Jenis:</strong> {{ $product->type }}</p>
                                <p class="card-text mb-1"><strong>Stok:</strong> {{ $product->stock }}</p>
                                <p class="card-text mb-1"><strong>Rp</strong> {{ number_format($product->price, 0, ',', '.') }}</p>
                                <p class="card-text fst-italic mt-2">{{ $product->description }}</p>
>>>>>>> 3f7dd2ad80946d30da4b0dd056afa97db5ca44bf
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning mt-4">
            Tidak ada produk yang cocok dengan pencarian kamu.
        </div>
    @endif
</div>
@endsection
