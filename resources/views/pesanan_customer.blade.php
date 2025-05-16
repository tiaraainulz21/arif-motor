@extends('layouts.app')

@section('content')
<style>
    .container {
        width: 90%;
        margin: 20px auto;
    }

    .item-card {
        background: white;
        display: flex;
        align-items: center;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .item-card img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-right: 20px;
        border-radius: 6px;
    }

    .item-info {
        flex: 1;
    }

    .item-info h3 {
        margin: 0;
        font-size: 18px;
    }

    .item-info p {
        margin: 5px 0 0 0;
        font-size: 14px;
        color: gray;
    }

    .item-total {
        font-weight: bold;
        font-size: 16px;
        text-align: right;
    }
</style>

<div class="container">
        @forelse ($details as $detail)
        <div class="item-card">
            <img src="{{ asset('storage/' . $detail->product->image) }}" alt="{{ $detail->product->name }}">
            <div class="item-info">
                <h3>{{ $detail->product->name }}</h3>
                <p>{{ $detail->qty }}x</p>
            </div>
            <div class="item-total">
                Rp {{ number_format($detail->sub_total, 0, ',', '.') }}
            </div>
        </div>
    @empty
        <p>Tidak ada detail pesanan.</p>
    @endforelse

</div>
@endsection
