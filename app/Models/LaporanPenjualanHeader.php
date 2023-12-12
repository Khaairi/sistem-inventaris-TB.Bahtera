<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualanHeader extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laporaPenjualanDetail()
    {
        return $this->hasMany(LaporanPenjualanDetail::class);
    }
}
