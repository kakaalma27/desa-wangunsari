<?php

namespace App\Models;

use App\Models\Struktur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnggotaStruktur extends Model
{
    protected $fillable = ['strukturs_id','nama', 'nip', 'jataban','tupoksi','image'];

    public function Struktur()
    {
        return $this->belongsTo(Struktur::class, 'strukturs_id', 'id');
    }
}
