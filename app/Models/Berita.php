<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['judul', 'deskripsi','image'];

    // Jika Anda ingin meng-cast image sebagai tipe data tertentu (misalnya JSON)
    protected $casts = [
        'image' => 'array',
    ];
}
