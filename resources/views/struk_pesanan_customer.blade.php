@extends('layouts.app')

@section('content')
<style>
    .struk-container {
        width: 90%;
        margin: 20px auto;
    }

    .struk-item {
        background: white;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px;
        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .struk-item:hover {
        transform: scale(1.01);
    }

    .struk-info {
        display: flex;
        flex-direction: column;
    }

    .struk-info span {
        font-weight: bold;
        font-size: 16px;
    }

    .struk-status button {
        background-color: #0e4d1d;
        border: none;
        color: white;
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: bold;
    }

    .struk-harga {
        text-align: right;
    }

    .struk-harga h4 {
        color: #000000;
        font-size: 18px;
        font-weight: bold;
    }

    .struk-tanggal {
        font-size: 14px;
        color: #000000;
    }

</style>

<div class="struk-container">
    @foreach ($struk as $item)
        <div onclick="window.location='{{ route('pesanan', $item['id']) }}'" class="struk-item">
            <div class="struk-info">
                <span>{{ $item['kode'] }}</span>
                <div class="struk-status">
                    <button>{{ $item['status'] }}</button>
                </div>
            </div>
            <div class="struk-harga">
                <div class="struk-tanggal">{{ $item['tanggal'] }}</div>
                <h4>Total Pesanan: Rp.{{ number_format($item['total'], 0, ',', '.') }}</h4>
            </div>
        </div>
    @endforeach
</div>
@endsection
