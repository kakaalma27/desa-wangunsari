<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    protected $fillable = ['dusun_id', 'nama', 'jenis_kelamin', 'staus', 'tempat_lahir', 'tanggal_lahir', 'pekerjaan', 'pendidikan'];

    public function dusun()
    {
        return $this->belongsTo(dusun::class, 'dusun_id', 'id');
    }
}
