<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua user role 'user' saja, urutkan terbaru
        $users = User::where('role', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.users.index', compact('users'));
    }

    public function resetVote($id)
    {
        // Hapus semua vote milik user tertentu
        Vote::where('user_id', $id)->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Vote user berhasil diaktifkan kembali.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dihapus.');
    }

}
