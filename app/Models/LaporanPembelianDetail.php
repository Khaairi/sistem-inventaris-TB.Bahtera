<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPembelianDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laporanPembelianHeader()
    {
        return $this->belongsTo(LaporanPembelianHeader::class);
    }
}
