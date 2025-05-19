<!DOCTYPE html>
<html>
<head>
    <title>Resume Service</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h2 { text-align: center; }
        p { margin: 5px 0; }
    </style>
</head>
<body>
    <h2>RESUME LAYANAN SERVICE</h2>
    <p>No. Antrean: {{ $service->queue_number }}</p>
    <p>Nama: {{ $service->name }}</p>
    <p>Alamat: {{ $service->address }}</p>
    <p>No. HP: {{ $service->phone }}</p>
    <p>Varian Motor: {{ $service->vehicle }}</p>
    <p>Jenis Service: {{ $service->type }}</p>
    <p>Tanggal Registrasi: {{ date('d-m-Y', strtotime($service->date)) }}</p>
    <p>Jam Kedatangan: {{ $service->time }}</p>
</body>
</html>
