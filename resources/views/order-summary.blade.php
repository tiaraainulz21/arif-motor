@extends('layouts.app')

@section('title', 'Ringkasan Pesanan - Customer')

@section('content')
<div class="container mt-4">
    <h4 class="text-success">RINGKASAN PESANAN</h4>
    
    <!-- Informasi Pelanggan -->
    <div class="card p-3 mb-3">
        <strong>{{ $order['customer']['name'] }}</strong> ({{ $order['customer']['phone'] }}) <br>
        <p>{{ $order['customer']['address'] }}</p>
    </div>

    <!-- Produk -->
    <div class="card p-3 mb-3">
        <div class="d-flex">
            <img src="{{ $order['product']['image'] }}" alt="Produk" class="me-3">
            <div>
                <strong>{{ $order['product']['name'] }}</strong>
                <p>Rp.{{ number_format($order['product']['price'], 0, ',', '.') }}</p>
                <div class="d-flex align-items-center">
                    
                    <!-- Tombol & Input Quantity -->
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" value="1" class="form-control text-center mx-2" style="width: 50px;" readonly>
                    <button class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
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
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <h5>Metode Pembayaran</h5>
    <div class="mb-3">
        <button class="btn btn-outline-success">COD</button>
        <button class="btn btn-outline-success">Transfer Bank</button>
        <button class="btn btn-outline-success">Dana</button>
    </div>

    <!-- Total Pembayaran -->
    <div class="card p-3">
        <p>Subtotal untuk Produk: <strong>Rp.{{ number_format($order['subtotal'], 0, ',', '.') }}</strong></p>
        <p>Subtotal Pengiriman: <strong>Rp.{{ number_format($order['shipping'], 0, ',', '.') }}</strong></p>
        <p>Biaya Layanan: <strong>Rp.{{ number_format($order['service_fee'], 0, ',', '.') }}</strong></p>
        <h4>Total Pembayaran: <strong>Rp.{{ number_format($order['total'], 0, ',', '.') }}</strong></h4>
        <button class="btn btn-success w-100">Buat Pesanan</button>
    </div>
</div>
@endsection
