@extends('layouts.app')

@section('content')
<div class="container">
    <div class="left-section">
        <h1>ARIF MOTOR</h1>
        <p>| Belanja SparePart dan Layanan Service Online</p>
    </div>
    <div class="right-section">
        <h2>DAFTAR</h2>

        {{-- Menampilkan pesan error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register_post') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
            <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
            <input type="text" name="no_hp" placeholder="No Hp" value="{{ old('no_hp') }}" required>

            <select name="jenis_kelamin" required>
                <option value="" disabled {{ old('jenis_kelamin') == null ? 'selected' : '' }}>Jenis Kelamin</option>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>

            <input type="email" name="email" placeholder="Email@" value="{{ old('email') }}" required>
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Daftar</button>
        </form>
    </div>
</div>
@endsection
