@extends('layouts.app')

@section('title', 'Resume Layanan Service')

@section('content')
<style>
 

.wrapper {
    padding-top: 30px; /* kasih jarak supaya nggak mepet navbar */
    display: flex;
    justify-content: center;
}

h2 {
    text-align: center;
    color: #0B3D02;
    font-weight: bold;
    margin-bottom: 20px;
}

p {
    font-size: 20px;
    color: #333;
    margin: 5px 0;
}

button {
    display: block;
    margin-left: auto;
    background-color: #0B3D02;
    color: white;
    border: none;
    padding: 5px 10px;
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
<div class="wrapper">
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
</div>
<script>
    function printPDF() {
        window.print();
    }
    </script>
@endsection
