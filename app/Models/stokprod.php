<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokprod extends Model
{
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }

    public function color(){
        return $this->belongsTo(color::class);
    }

    public function size(){
        return $this->belongsTo(size::class);
    }
}
