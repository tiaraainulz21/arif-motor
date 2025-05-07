@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2><i class="fas fa-shopping-cart"></i> KERANJANG</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga Satuan</th>
                <th>Kuantitas</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
            @endphp
            @forelse($cart as $cart)
            <tr>
                <td>{{ $cart->product->name }}</td>
                <td>Rp.{{ number_format($cart->product->price, 0, ',', '.') }}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
                        <input type="text" name="qty" id="quantity" value="{{ $cart->qty }}" class="form-control text-center mx-2" style="width: 50px;" readonly>
                        <button type="button" class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
                    </div>
                </td>
                <td>Rp.{{ number_format($cart->product->price * $cart['qty'], 0, ',', '.') }}</td>
            </tr>
            @php
                $total += $cart->product->price * $cart['qty'];
            @endphp
            
            @empty
            <tr>
                <td colspan="4" class="text-center">Keranjang Kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h4 class="text-end">Total: <strong>Rp.{{ number_format($total ?? 0, 0, ',', '.') }}</strong></h4>

    <a href="{{ route('order.summary') }}" class="btn btn-success">
        <i class="fas fa-check"></i> Checkout
    </a>
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

@endsection
