<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
