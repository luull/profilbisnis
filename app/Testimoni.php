<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = "testimoni";
    protected $guarded = ['id'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'produk_id');
    }
}
