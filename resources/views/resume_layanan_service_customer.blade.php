@extends('layouts.app')

@section('title', 'Resume Layanan Service')

@section('content')
<style>


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

    <p>No. Antrean: {{ $service->queue_number }}</p>
    <p>Nama: {{ $service->name }}</p>
    <p>Alamat: {{ $service->address }}</p>
    <p>No. HP: {{ $service->phone }}</p>
    <p>Varian Motor: {{ $service->vehicle }}</p>
    <p>Jenis Service: {{ $service->type }}</p>
    <p>Tanggal Registrasi: {{ date('d-m-Y', strtotime($service->date)) }}</p>
    <p>Jam Kedatangan: {{ $service->time }}</p>

    <button class="print-btn" onclick="printPDF()">Cetak</button>
</div>
<script>
    function printPDF() {
        window.print();
    }
    </script>
@endsection
