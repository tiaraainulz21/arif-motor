@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <h3 class="text-center my-4">PRODUK</h3>
        
        <div class="card shadow p-4">
            <div class="row align-items-center">
                <!-- Kolom Kiri (Gambar Produk) -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="img-fluid rounded">
                </div>

                <!-- Kolom Kanan (Detail Produk) -->
                <div class="col-md-8">
                    <h5 class="fw-bold">{{ $product['name'] }}</h5>
                    <p><strong>Merk:</strong> {{ $product['brand'] }}</p>
                    <p><strong>Jenis:</strong> {{ $product['type'] }}</p>
                    <p><strong>Kondisi:</strong> {{ $product['condition'] }}</p>
                    <p><strong>Stok:</strong> {{ $product['stock'] }}</p>
                    <p><strong>Harga:</strong> Rp.{{ number_format($product['price'], 0, ',', '.') }}</p>

                    <!-- Tombol & Input Quantity -->
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
                        <input type="text" name="qty" id="quantity" value="1" class="form-control text-center mx-2" style="width: 50px;" readonly>
                        <button type="button" class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
                    </div>

                    <script>
                        function increaseQuantity() {
                            let quantityInput = document.getElementById('quantity');
                            let currentValue = parseInt(quantityInput.value);
                            quantityInput.value = currentValue + 1;
                        }

                        function decreaseQuantity() {
                            let quantityInput = document.getElementById('quantity');
                            let currentValue = parseInt(quantityInput.value);
                            if (currentValue > 1) {
                                quantityInput.value = currentValue - 1;
                            }
                        }
                    </script>


                    <div class="mt-3">
                        <button class="btn btn-success">
                            <i class="fas fa-cart-plus"></i> Masukan Keranjang
                        </button>
                        
                        <a href="{{ route('order.summary') }}" class="btn btn-dark">
                            <i class="fas fa-shopping-bag"></i> Beli Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
