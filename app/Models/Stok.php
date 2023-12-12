<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_barang', 'like', '%' . $search . '%')->orWhere('harga_jual', 'like', '%' . $search . '%');
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
