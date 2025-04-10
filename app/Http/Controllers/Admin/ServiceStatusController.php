<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QueueService;
use Illuminate\Http\Request;

class ServiceStatusController extends Controller
{
    // Tampilkan semua data service
    public function index()
    {
        $services = QueueService::orderBy('date', 'desc')->get();
        return view('admin.service_status.index', compact('services'));
    }

    // Update status service
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Diproses,Selesai',
        ]);

        $service = QueueService::findOrFail($id);
        $service->status = $request->status;
        $service->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
}
