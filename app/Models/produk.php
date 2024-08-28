<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function cart()
    {
        return $this->hasMany(cart::class);
    }

    public function foto()
    {
        return $this->hasMany(foto::class);
    }

    public function size()
    {
        return $this->hasMany(size::class);
    }

    public function color()
    {
        return $this->hasMany(color::class);
    }

    public function stok()
    {
        return $this->hasMany(stokprod::class);
    }
}
