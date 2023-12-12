<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $attributes = [
        "banyak_barang" => 0
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class);
    }
}
