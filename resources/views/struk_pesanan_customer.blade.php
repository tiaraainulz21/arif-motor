@extends('layouts.app')

@section('content')
<style>
    .container {
        width: 90%;
    }

    .item-card {
        background: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    .status-badge {
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
    }

    .status-diproses {
        background-color: green;
    }

    .status-dikemas {
        background-color: green;
    }

    .status-diterima {
        background-color: green;
    }

    .item-info h5 {
        margin: 0;
        font-size: 16px;
    }

    .item-subinfo {
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
    @forelse ($transactions as $transaction)
        @php
            $statusClass = match($transaction->status) {
                'Diproses' => 'status-diproses',
                'Dikemas' => 'status-dikemas',
                'Diterima' => 'status-diterima',
                default => 'bg-secondary'
            };
        @endphp
        <div class="item-card" onclick="window.location.href='{{ route('transactions.detail', $transaction->id) }}'">
            <div class="item-info">
                <h5>{{ $transaction->transaction_code }}</h5>
                <span class="status-badge {{ $statusClass }}">
                    {{ $transaction->status }}
                </span>
            </div>
            <div class="item-total">
                <div class="item-subinfo">{{ \Carbon\Carbon::parse($transaction->date)->format('d-m-Y') }}</div>
                <div>Total: Rp{{ number_format($transaction->total, 0, ',', '.') }}</div>
            </div>
        </div>
    @empty
        <p>Tidak ada transaksi.</p>
    @endforelse
</div>
@endsection
