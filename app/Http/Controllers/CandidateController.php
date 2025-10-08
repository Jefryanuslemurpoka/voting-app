<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    /**
     * Tampilkan daftar semua calon
     */
    public function index()
    {
        try {
            // Ambil semua calon terbaru, pagination biar rapi
            $candidates = Candidate::latest()->paginate(10);

            return view('dashboard.candidate.index', compact('candidates'));
        } catch (\Exception $e) {
            Log::error('Gagal menampilkan daftar calon: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat memuat daftar calon.');
        }
    }

    /**
     * Simpan data calon baru
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'name'  => 'required|string|max:255',
                'visi'  => 'required|string',
                'misi'  => 'required|string',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Upload foto jika ada
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('candidates', 'public');
            }

            // Simpan ke database
            Candidate::create([
                'name'  => $validated['name'],
                'visi'  => $validated['visi'],
                'misi'  => $validated['misi'],
                'photo' => $photoPath,
            ]);

            return redirect()
                ->route('admin.candidates.index')
                ->with('success', 'Calon berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan calon: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan, data calon gagal disimpan.');
        }
    }

    /**
     * Halaman edit calon
     */
    public function edit($id)
    {
        try {
            $candidate = Candidate::findOrFail($id);
            return view('dashboard.candidate.edit', compact('candidate'));
        } catch (\Exception $e) {
            Log::error('Gagal membuka halaman edit: ' . $e->getMessage());
            return redirect()
                ->route('admin.candidates.index')
                ->with('error', 'Data calon tidak ditemukan.');
        }
    }

    /**
     * Update data calon
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name'  => 'required|string|max:255',
                'visi'  => 'required|string',
                'misi'  => 'required|string',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $candidate = Candidate::findOrFail($id);

            // Cek apakah ada foto baru
            if ($request->hasFile('photo')) {
                // Hapus foto lama jika ada
                if ($candidate->photo) {
                    Storage::disk('public')->delete($candidate->photo);
                }
                $photoPath = $request->file('photo')->store('candidates', 'public');
                $candidate->photo = $photoPath;
            }

            $candidate->name = $validated['name'];
            $candidate->visi = $validated['visi'];
            $candidate->misi = $validated['misi'];
            $candidate->save();

            return redirect()
                ->route('admin.candidates.index')
                ->with('success', 'Data calon berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Gagal update calon: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat update data.');
        }
    }

    /**
     * Hapus calon
     */
    public function destroy($id)
    {
        try {
            $candidate = Candidate::findOrFail($id);

            // Hapus foto lama jika ada
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }

            $candidate->delete();

            return redirect()
                ->route('admin.candidates.index')
                ->with('success', 'Calon berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus calon: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan, calon gagal dihapus.');
        }
    }
}
