<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategoriPekerjaan extends Model
{
    protected $table = "sub_kategori_pekerjaan";
    protected $fillable = ['kategori_id', 'sub_kategori_id', 'nama', 'createdBy'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(Member::class, 'sub_kategori_pekerjaan', 'id');
    }
    public function kategori_pekerjaan()
    {
        return $this->belongsTo(KategoriPekerjaan::class, 'kategori_id', 'id');
    }
}
