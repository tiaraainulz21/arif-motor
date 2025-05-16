@extends('layouts.app')

@section('content')
<style>
    .content h2 {
        color: rgb(0, 0, 0);
    }

    .notification-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .notification {
    background: white;
    padding: 15px 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 15px;
    width: 700px;
    min-height: 70px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .notification-text {
    font-size: 15px;
    text-align: left;
    flex: 1;
    }
    
    .notification-date {
    font-size: 14px;
    color: gray;
    white-space: nowrap;
    margin-left: 40px;
    }
</style>

<div class="content text-center">
    <h2>Notifikasi Anda</h2>
    <p>Berikut adalah notifikasi terbaru untuk Anda</p>

    @if($notifikasi->isEmpty())
        <p>Tidak ada notifikasi baru.</p>
    @else
        <div class="notification-container">
            @foreach($notifikasi as $notification)
                <div class="notification">
                    <div class="notification-text">
                        {{ $notification->title }} {{ Str::limit($notification->message, 100) }}
                    </div>
                    <div class="notification-date">
                        {{ $notification->created_at->format('d-m-Y') }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
