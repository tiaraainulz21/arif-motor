@extends('layouts.app')

@section('title', 'Resume Layanan Service')

@section('content')
<style>
 .container {
    max-width: 500px;
    margin: 5px auto;
    padding: 20px;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h2 {
    text-align: center;
    color: #0B3D02;
    font-weight: bold;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    color: #333;
    margin: 10px 0;
}

button {
    display: block;
    margin-left: auto;
    background-color: #0B3D02;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

@media print {
    body {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    .print-area {
        width: 80%;
        margin: auto;
        padding: 20px;
        border: 1px solid #ddd;
        box-shadow: none;
        background: white;
    }

    .navbar, .menu { 
        display: none !important; 
    }
    
    /* Sembunyikan tombol cetak saat print */
    .print-btn {
        display: none;
    }
}
</style>

<div class="container">
    <h2>RESUME LAYANAN SERVICE</h2>

    <p>No. Antrean: {{ $service->no_antrean }}</p>
    <p>Nama: {{ $service->nama }}</p>
    <p>Alamat: {{ $service->alamat }}</p>
    <p>No. HP: {{ $service->no_hp }}</p>
    <p>Varian Motor: {{ $service->varian_motor }}</p>
    <p>Jenis Service: {{ $service->jenis_service }}</p>
    <p>Tanggal Registrasi: {{ date('d-m-Y', strtotime($service->tanggal_registrasi)) }}</p>
    <p>Jam Kedatangan: {{ $service->jam_kedatangan }}</p>

    <button class="print-btn" onclick="printPDF()">Cetak</button>
</div>
<script>
    function printPDF() {
        window.print();
    }
    </script>
@endsection
