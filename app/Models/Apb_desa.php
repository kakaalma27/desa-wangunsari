<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apb_desa extends Model
{
    protected $fillable = ['kategori', 'judul', 'deskripsi'];

    public function invDesa()
    {
        return $this->hasMany(Inv_desa::class, 'apb_id', 'id');
    }
}
