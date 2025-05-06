@extends('layouts.app')

@section('content')
<style>
    .content h2 {
        color: darkgreen;
    }

    .notification-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .notification {
        background: white;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: left;
        width: 250px;
        border-radius: 10px;
    }

    .notification p {
        margin: 5px 0;
        font-size: 14px;
    }

    .notification .title {
        font-weight: bold;
        font-size: 16px;
    }
</style>

<div class="content text-center">
    <h2>Notifikasi Anda</h2>
    <p>Berikut adalah notifikasi terbaru untuk Anda</p>

    <!-- Menambahkan pengecekan jika tidak ada notifikasi -->
    @if($notifikasi->isEmpty())
        <p>Tidak ada notifikasi baru.</p>
    @else
        <div class="notification-list">
            @foreach($notifikasi as $notification)
                <div class="notification">
                    <p class="title">{{ $notification->title }}</p>
                    <p>{{ Str::limit($notification->message, 100) }}</p>
                    <p><em>{{ $notification->created_at->format('d-m-Y') }}</em></p>
                    <!-- Link ke halaman detail notifikasi (opsional) -->
                    <a href="{{ route('admin.notifikasi.show', $notification->id) }}" class="btn btn-link">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
