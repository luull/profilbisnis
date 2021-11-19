<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukDefault extends Model
{
    protected $table = "default_produk";
    protected $guarded = ['id'];
    public $timestamps = false;
    public function bisnis()
    {
        return $this->belongsTo(BisnisDefault::class, 'bisnis_id', 'id');
    }
    public function testimoni()
    {
        return $this->hasMany(TestimoniDefault::class, 'id', 'produk_id');
    }
}
