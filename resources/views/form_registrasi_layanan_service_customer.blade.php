@extends('layouts.nav')

@section('content')
<style>
/* === FORM REGISTRASI === */
.form-container {
    width: 40%;
    margin: 5px auto;
    padding: 45px;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
}

/* === JUDUL === */
.form-container h2 {
    color: #065F22;
    margin-bottom: 25px;
    font-size: 22px;
    font-weight: bold;
}

/* === GRID FORM === */
.form-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

/* Input & Select */
.form-group input {
    width: 43%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #aaa;
    font-size: 14px;
    background: #f9f9f9;
    color: #333;
}
.form-group select {
    width: 47%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #aaa;
    font-size: 14px;
    background: #f9f9f9;
    color: #333;
}

/* No HP, Varian Motor, dan Jenis Service Full Width */
.form-group:nth-child(3) input, /* No HP */
.form-group:nth-child(4) input, /* Varian Motor */
.form-group:nth-child(5) select { /* Jenis Service */
    width: 43%;
}

/* Tombol Kirim */
button {
    width: 80px;
    padding: 7px;
    background-color: #065F22;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
    display: block;
    margin: 0px auto 0;
}


/* === RESPONSIVE === */
@media (max-width: 768px) {
    .form-container {
        width: 90%;
    }

    .form-group {
        flex-direction: column;
        align-items: center;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>
<div class="form-container">
    <h2>FORMULIR REGISTRASI</h2>
    <form action="{{ route('service.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="nama" placeholder="Nama" required>
            <select name="jenis_service" required>
                <option value="" disabled selected>Jenis Service</option>
                <option value="Service Rutin">Service Rutin</option>
                <option value="Ganti Oli">Ganti Oli</option>
                <option value="Perbaikan Mesin">Perbaikan Mesin</option>
            </select>
        </div>
        
        <div class="form-group">
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="date" name="tanggal_registrasi" required>
        </div>

        <div class="form-group">
            <input type="text" name="no_hp" placeholder="No. HP" required>
            <input type="time" name="jam_kedatangan" required>
        </div>

        <div class="form-group">
            <input type="text" name="varian_motor" placeholder="Varian Motor" required>
        </div>

        <button type="submit">Kirim</button>
    </form>
</div>
@endsection
