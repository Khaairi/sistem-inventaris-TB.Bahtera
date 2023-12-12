<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartBelanja extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }
}
