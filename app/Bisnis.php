<?php

namespace App;

use App\Member;
use App\Produk;
use Illuminate\Database\Eloquent\Model;

class Bisnis extends Model
{
    protected $table = "bisnis";
    protected $fillable = ['member_id', 'nama', 'slug', 'keterangan_singkat', 'keterangan', 'logo', 'tgl_input', 'petugas_input', 'tgl_update', 'petugas_update'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'bisnis_id', 'id');
    }
}
