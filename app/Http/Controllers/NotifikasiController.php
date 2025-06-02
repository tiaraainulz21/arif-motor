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

    // ✅ Untuk admin melihat semua notifikasi dengan fitur pencarian
    public function adminIndex(Request $request)
    {
        $search = $request->input('search');

        $notifikasi = Notification::with('user');

        if ($search) {
            $notifikasi = $notifikasi->where(function($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('message', 'like', "%{$search}%")
                      // Cari berdasarkan nama customer terkait user
                      ->orWhereHas('user.customer', function($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      })
                      // Cari berdasarkan username user
                      ->orWhereHas('user', function($q) use ($search) {
                          $q->where('username', 'like', "%{$search}%");
                      });
            });
        }

        $notifikasi = $notifikasi->latest()->get();

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

    // ✅ Hapus notifikasi (admin)
    public function destroy($id)
    {
        $notifikasi = Notification::findOrFail($id);
        $notifikasi->delete();

        return redirect()->route('admin.notifikasi.index')->with('success', 'Notifikasi berhasil dihapus!');
    }

    // ✅ Hapus notifikasi (customer hanya bisa hapus miliknya sendiri)
    public function customerDestroy(Notification $notifikasi)
    {
        if ($notifikasi->user_id !== Auth::id()) {
            abort(403); // Tidak boleh hapus notifikasi milik orang lain
        }

        $notifikasi->delete();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus.');
    }
}
