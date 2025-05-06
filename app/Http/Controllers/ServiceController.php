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

        // Ambil tanggal hari ini
        $tanggalHariIni = Carbon::today()->toDateString();

        // Hitung jumlah antrean hari ini
        $jumlahAntreanHariIni = QueueService::where('date', $tanggalHariIni)->count();

        // No. antrean = jumlah antrean hari ini + 1
        $noAntrean = $jumlahAntreanHariIni + 1;

        $service = QueueService::create([
            'user_id'=> Auth::user()->id,
            'queue_number' => $noAntrean, // Antrean berurutan
            'name' => $request->nama,
            'address' => $request->alamat,
            'phone' => $request->no_hp,
            'vehicle' => $request->varian_motor,
            'type' => $request->jenis_service,
            'date' => $request->tanggal_registrasi,
            'time' => $request->jam_kedatangan,
        ]);

        return redirect()->route('service.resume', $service->id);
    }


    public function generatePDF($id)
    {
    $service = QueueService::findOrFail($id);
    $pdf = Pdf::loadView('resume_service_pdf', compact('service'));
    return $pdf->download('resume-service-'.$service->queue_number.'.pdf');
    }


    public function showResume($id)
    {
        $service = QueueService::findOrFail($id);
        return view('resume_layanan_service_customer', compact('service'));
    }

   
}
  