<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\QueueService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function showForm()
    {
        return view('form_registrasi_layanan_service_customer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'varian_motor' => 'required|string',
            'jenis_service' => 'required|string',
            'tanggal_registrasi' => 'required|date',
            'jam_kedatangan' => 'required'
        ]);

        $userId = Auth::user()->id;
        $tanggalDipilih = $request->tanggal_registrasi;

        // Hitung jumlah antrean milik user ini di tanggal yang dipilih
        $jumlahAntreanHariIni = QueueService::where('user_id', $userId)
            ->where('date', $tanggalDipilih)
            ->count();

        // No. antrean = antrean yang sudah dimiliki user di tanggal itu + 1
        $noAntrean = $jumlahAntreanHariIni + 1;

        // Simpan data service
        $service = QueueService::create([
            'user_id' => $userId,
            'queue_number' => $noAntrean,
            'name' => $request->nama,
            'address' => $request->alamat,
            'phone' => $request->no_hp,
            'vehicle' => $request->varian_motor,
            'type' => $request->jenis_service,
            'date' => $tanggalDipilih,
            'time' => $request->jam_kedatangan,
        ]);

        // Arahkan ke halaman resume
        return redirect()->route('service.resume', $service->id);
    }

    public function showResume($id)
    {
        $service = QueueService::findOrFail($id);
        return view('resume_layanan_service_customer', compact('service'));
    }

    public function generatePDF($id)
    {
        $service = QueueService::findOrFail($id);
        $pdf = Pdf::loadView('resume_service_pdf', compact('service'));
        return $pdf->download('resume-service-' . $service->queue_number . '.pdf');
    }

    // Tampilkan form edit
public function editStatus($id)
{
    $service = \App\Models\QueueService::findOrFail($id);
    return view('admin.service_status.edit', compact('service'));
}

// Simpan perubahan status
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Diproses,Selesai',
    ]);

    $service = \App\Models\QueueService::findOrFail($id);
    $service->status = $request->status;
    $service->save();

    return redirect()->route('admin.service_status.index')->with('success', 'Status berhasil diperbarui.');
}

public function index(Request $request)
{
    $query = \App\Models\QueueService::query();

    // Cek apakah ada input pencarian
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', '%' . $search . '%');
    }

    // Ambil semua data yang cocok
    $services = $query->orderBy('created_at', 'desc')->get();

    return view('admin.service_status.index', compact('services'));
}


}
