@extends('layouts.app')

@section('content')
<div class="container">
    <div class="left-section">
        <h1>ARIF MOTOR</h1>
        <p>| Belanja SparePart dan Layanan Service Online</p>
    </div>
    <div class="right-section">
        <h2>MASUK</h2>
        <form action="{{ route('login_post') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Masuk</button>
            <a href="{{ route('register') }}">Daftar Akun</a>
        </form>
    </div>
</div>
@endsection
