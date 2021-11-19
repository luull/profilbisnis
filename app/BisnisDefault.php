<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BisnisDefault extends Model
{
    protected $table = "default_bisnis";
    protected $fillable = ['nama', 'slug', 'keterangan_singkat', 'keterangan', 'logo', 'tgl_input', 'petugas_input', 'tgl_update', 'petugas_update'];
    public $timestamps = false;
    public function produk()
    {
        return $this->hasMany(ProdukDefault::class, 'bisnis_id', 'id');
    }
}
