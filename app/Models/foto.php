<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    protected $guarded = [];


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
