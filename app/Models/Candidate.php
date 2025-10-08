<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vote;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'visi',
        'misi',
        'photo',
    ];

    /**
     * Relasi ke votes (one candidate has many votes)
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
