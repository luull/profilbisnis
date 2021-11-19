<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriPekerjaan extends Model
{
    protected $table = "kategori_pekerjaan";
    protected $fillable = ['nama', 'createdBy'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(Member::class, 'kategori_pekerjaan', 'id');
    }
    public function sub_kategori_pekerjaan()
    {
        return $this->hasMany(SubKategoriPekerjaan::class, 'kategori_id', 'id');
    }
}
