<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'nohp','image'];
}
