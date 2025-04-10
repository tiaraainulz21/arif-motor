@extends('layouts.app')

@section('content')
<div class="container">
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
            @if(!empty($cart['name']))
            <tr>
                <td>{{ $cart['name'] }}</td>
                <td>Rp.{{ number_format($cart['price'], 0, ',', '.') }}</td>
                <td>{{ $cart['quantity'] }}</td>
                <td>Rp.{{ number_format($cart['total'], 0, ',', '.') }}</td>
            </tr>
            @else
            <tr>
                <td colspan="4" class="text-center">Keranjang Kosong</td>
            </tr>
            @endif
        </tbody>
    </table>

    <h4 class="text-end">Total: <strong>Rp.{{ number_format($cart['total'] ?? 0, 0, ',', '.') }}</strong></h4>

    <button class="btn btn-success"><i class="fas fa-check"></i> Checkout</button>
</div>
@endsection
