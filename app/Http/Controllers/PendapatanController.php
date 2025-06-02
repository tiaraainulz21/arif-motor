<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction;
use Carbon\Carbon;

class PendapatanController extends Controller
{
    public function index()
    {
        $pendapatan = Transaction::selectRaw('date as tanggal, SUM(total) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $labels = $pendapatan->pluck('tanggal')->map(function ($tanggal) {
            return Carbon::parse($tanggal)->translatedFormat('d M Y');
        });

        $totals = $pendapatan->pluck('total');

        // Hitung total keseluruhan pendapatan
        $totalPendapatan = $pendapatan->sum('total');

        return view('admin.pendapatan.index', compact('labels', 'totals', 'totalPendapatan'));
    }

    public function exportPdf()
{
    $pendapatan = Transaction::selectRaw('DATE(date) as tanggal, COUNT(*) as jumlah_produk, SUM(total) as total')
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();

    $totalPendapatan = $pendapatan->sum('total');

    return Pdf::loadView('admin.pendapatan.laporan_pdf', compact('pendapatan', 'totalPendapatan'))
        ->download('laporan_pendapatan.pdf');
}
}
