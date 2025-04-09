<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Carbon\Carbon;

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
        $jumlahAntreanHariIni = Service::where('tanggal_registrasi', $tanggalHariIni)->count();

        // No. antrean = jumlah antrean hari ini + 1
        $noAntrean = $jumlahAntreanHariIni + 1;

        $service = Service::create([
            'no_antrean' => $noAntrean, // Antrean berurutan
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'varian_motor' => $request->varian_motor,
            'jenis_service' => $request->jenis_service,
            'tanggal_registrasi' => $request->tanggal_registrasi,
            'jam_kedatangan' => $request->jam_kedatangan,
        ]);

        return redirect()->route('service.resume', $service->id);
    }

    public function showResume($id)
    {
        $service = Service::findOrFail($id);
        return view('resume_layanan_service_customer', compact('service'));
    }

    public function index()
    {
        // Urutkan antrean berdasarkan tanggal dan nomor antrean
        $services = Service::orderBy('tanggal_registrasi', 'desc')
                           ->orderBy('no_antrean', 'asc')
                           ->get();

        return view('service.index', compact('services'));
    }
}
  