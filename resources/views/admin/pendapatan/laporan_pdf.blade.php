<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pendapatan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #e0e0e0; }
        .total-row { background-color: #dbe4ea; font-weight: bold; }
    </style>
</head>
<body>

    <h3 style="text-align:center;">LAPORAN PENDAPATAN</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jumlah produk yang terjual</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatan as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->jumlah_produk }}</td>
                    <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="3">TOTAL PENDAPATAN</td>
                <td>Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
