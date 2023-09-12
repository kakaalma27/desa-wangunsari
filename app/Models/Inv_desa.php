<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inv_desa extends Model
{
    use SoftDeletes;
    protected $fillable = ['apb_id', 'nama', 'kode', 'nup', 'merek', 'tahun'];

    public function apbDesa()
    {
        return $this->belongsTo(Apb_desa::class, 'apb_id', 'id');
    }
}
