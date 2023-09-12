<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dusun extends Model
{
    protected $fillable = ['dusun', 'rt', 'deskripsi'];

    public function masyarakats()
    {
        return $this->hasMany(masyarakat::class, 'dusun_id', 'id');
    }
}
