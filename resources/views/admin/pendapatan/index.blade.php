<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Grafik Pendapatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        canvas {
            max-height: 400px;
        }
    </style>
</head>
<body style="background-color: #f0f9f0;">

    <div class="container py-5">

        <h2 class="text-success fw-bold mb-4 text-center">Grafik Pendapatan</h2>

        {{-- CARD Total Pendapatan --}}
        <div class="row mb-4 justify-content-center">
            <div class="col-md-3">
                <div class="card text-white bg-success shadow">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-sack-dollar fa-2x"></i>
                        <p class="mt-2 mb-1">Total Pendapatan</p>
                        <h3 class="fw-bold">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- GRAFIK --}}
        <div class="card shadow-sm p-4" style="min-height: 450px;">
            @if (!empty($labels) && !empty($totals))
                <canvas id="grafikPendapatan"></canvas>
            @else
                <p class="text-center text-muted">Belum ada data pendapatan yang tersedia.</p>
            @endif
        </div>

        {{-- BUTTON Download PDF --}}
        <div class="text-center mt-4">
            <a href="{{ route('admin.pendapatan.pdf') }}" class="btn btn-outline-success">
                <i class="fa-solid fa-file-pdf me-2"></i>Download PDF
            </a>
        </div>

    </div>

    @if (!empty($labels) && !empty($totals))
    <script>
        const ctx = document.getElementById('grafikPendapatan').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total Pendapatan (Rp)',
                    data: {!! json_encode($totals) !!},
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25, 135, 84, 0.2)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.3,
                    pointBackgroundColor: '#198754',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    </script>
    @endif

</body>
</html>
