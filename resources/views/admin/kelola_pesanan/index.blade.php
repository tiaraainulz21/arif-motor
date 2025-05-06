<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Status Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Kelola Status Pesanan</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pesanan</th>
                <th>Total Pesanan</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $item)
            <tr>
                <td>{{ $item->nama_pesanan }}</td>
                <td>{{ $item->total_pesanan }}</td>
                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <form action="{{ url('/kelola-pesanan/'.$item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="form-select">
                            <option {{ $item->status == 'pending' ? 'selected' : '' }}>pending</option>
                            <option {{ $item->status == 'proses' ? 'selected' : '' }}>proses</option>
                            <option {{ $item->status == 'selesai' ? 'selected' : '' }}>selesai</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
