<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifikasiController extends Controller
{
    // ✅ Untuk customer melihat notifikasi miliknya sendiri
    public function index()
    {
        $notifikasi = Notification::where('user_id', Auth::id())->latest()->get();
        return view('notifikasi_customer', compact('notifikasi'));
    }

    // ✅ Untuk admin melihat semua notifikasi
    public function adminIndex()
    {
        $notifikasi = Notification::with('user')->latest()->get();
        return view('admin.notifikasi.index', compact('notifikasi'));
    }

    // ✅ Form tambah notifikasi
    public function create()
    {
        $users = User::role('customer')->get();
        return view('admin.notifikasi.create', compact('users'));
    }

    // ✅ Simpan notifikasi baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'date' => 'required|date',
        ]);

        Notification::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'message' => $request->message,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.notifikasi.index')->with('success', 'Notifikasi berhasil dikirim!');
    }

    // ✅ Form edit
    public function edit($id)
    {
        $notifikasi = Notification::findOrFail($id);
        $users = User::role('customer')->get();
        return view('admin.notifikasi.edit', compact('notifikasi', 'users'));
    }

    // ✅ Simpan update
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'date' => 'required|date',
        ]);

        $notifikasi = Notification::findOrFail($id);

        $notifikasi->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'message' => $request->message,
            'date' => $request->date,
        ]);

        return redirect()->route('admin.notifikasi.index')->with('success', 'Notifikasi berhasil diperbarui!');
    }

    // ✅ Hapus notifikasi
    public function destroy(Notification $notifikasi)
    {
        $notifikasi->delete();
        return redirect()->route('admin.notifikasi.index')->with('success', 'Notifikasi berhasil dihapus!');
    }
}
