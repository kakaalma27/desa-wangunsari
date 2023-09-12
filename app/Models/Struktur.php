<?php

namespace App\Models;

use App\Models\AnggotaStruktur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struktur extends Model
{
    protected $fillable = ['nama', 'deskripsi'];

    public function AnggotaStruktur()
    {
        return $this->hasMany(AnggotaStruktur::class, 'strukturs_id', 'id');
    }

}
