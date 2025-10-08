<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Vote;

class VoteController extends Controller
{
    /**
     * Tampilkan jumlah vote per calon
     */
    public function index()
    {
        // Ambil semua kandidat dengan jumlah vote
        $candidates = Candidate::withCount('votes')->get();

        // Hitung total semua vote
        $totalVotes = Vote::count();

        return view('dashboard.votes.index', compact('candidates', 'totalVotes'));
    }

    /**
     * Simpan vote user
     */
    public function store(Request $request, Candidate $candidate)
    {
        $user = $request->user();

        // Cek jika user sudah vote
        if ($user->vote()->exists()) {
            return redirect()->back()->with('error', 'Anda sudah memilih calon.');
        }

        // Simpan vote
        $user->vote()->create([
            'candidate_id' => $candidate->id,
        ]);

        return redirect()->back()->with('success', 'Vote berhasil!');
    }
}