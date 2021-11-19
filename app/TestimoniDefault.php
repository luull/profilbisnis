<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimoniDefault extends Model
{
    protected $table = "default_testimoni";
    protected $guarded = ['id'];
    public function produk()
    {
        return $this->belongsTo(ProdukDefault::class, 'produk_id', 'id');
    }
}
