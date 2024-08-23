<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }
}
