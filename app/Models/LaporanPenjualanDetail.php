<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualanDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laporanPenjualanHeader()
    {
        return $this->belongsTo(LaporanPenjualanHeader::class);
    }
}
