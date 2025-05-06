@extends('layouts.app')

@section('content')
<style>
.status-container {
    width: 90%;
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    text-align: center;
}

thead {
    background: darkgreen;
    color: white;
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
}

.product-img {
    width: 100px;
    height: auto;
    display: block;
    margin: 0 auto;
}

.resume-btn {
    background: darkgreen;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
}

.status-label {
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}

.status-label.selesai {
    background: orange;
    color: white;
}

.status-label.diproses {
    background: orange;
    color: white;
}

.floating-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background: transparent;
    border: none;
    cursor: pointer;
    z-index: 999;
}

.plus-icon {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
</style>
<div class="status-container">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Service</th>
                <th>Lihat Resume</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statusPesanan as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->type }}</td>
                <td>
                    <a href="{{ route('service.resume', $item->id) }}" class="resume-btn">Lihat Resume</a>
                </td>
                <td>
                    <span class="status-label {{ strtolower($item->status) }}">{{ $item->status }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('service.form') }}" class="floating-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-sign-intersection" viewBox="0 0 16 16">
        <path d="M7.25 4v3.25H4v1.5h3.25V12h1.5V8.75H12v-1.5H8.75V4z"/>
        <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098zm-1.4.7a.495.495 0 0 1 .7 0l6.516 6.515a.495.495 0 0 1 0 .7L8.35 14.866a.495.495 0 0 1-.7 0L1.134 8.35a.495.495 0 0 1 0-.7L7.65 1.134Z"/>
      </svg>
</a>
@endsection
