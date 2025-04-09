@extends('layouts.nav')

@section('content')
<style>
    .notifikasi-container {
    width: 90%;
    margin: 20px auto;
}

.notifikasi-item {
    background: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
    border-radius: 5px;
}
</style>
<style>

</style>
<div class="notifikasi-container">
    @foreach ($notifikasi as $item)
    <div class="notifikasi-item">
        <p>{{ $item['pesan'] }}</p>
        <span>{{ $item['tanggal'] }}</span>
    </div>
    @endforeach
</div>
@endsection