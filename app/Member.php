<?php

namespace App;

use App\Banner;
use App\Bisnis;
use App\Medsos;
use App\Produk;
use App\Youtube;
use App\Homepage;
use App\Bank_member;
use App\Blog_member;
use App\Landing_page;
use App\Wa_template;
use App\Themes;
use App\Level_member;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "member";
    protected $guarded = ['id'];
    public $timestamps = false;
    public function welcome_note()
    {
        return $this->hasOne(welcome_note::class, 'member_id', 'id');
    }

    public function bisnis()
    {
        return $this->hasMany(Bisnis::class, 'member_id', 'id');
    }
    public function medsos()
    {
        return $this->hasMany(Medsos::class, 'member_id', 'id');
    }
    public function bank_member()
    {
        return $this->hasMany(Bank_member::class, 'member_id', 'id');
    }
    public function blog_member()
    {
        return $this->hasMany(Blog_member::class, 'member_id', 'id');
    }

    public function homepage()
    {
        return $this->hasMany(Homepage::class, 'member_id', 'id');
    }
    public function landing_page()
    {
        return $this->hasMany(Landing_page::class, 'member_id', 'id');
    }
    public function gallery_photo()
    {
        return $this->hasMany(Gallery_photo::class, 'member_id', 'id');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'member_id', 'id');
    }
    public function kartu_nama()
    {
        return $this->hasOne(Kartu_nama::class, 'id', 'kartu_nama_id');
    }
    public function agenda()
    {
        $tgl = date('Y-m-d');
        return $this->hasMany(Agenda::class, 'member_id', 'id')->where('tanggal', '>=', $tgl)->orderBy('id', 'desc');
    }
    public function youtube()
    {
        return $this->hasMany(Youtube::class, 'member_id', 'id');
    }
    public function banner()
    {
        return $this->hasMany(Banner::class, 'member_id', 'id');
    }
    public function wa_template()
    {
        return $this->hasOne(Wa_template::class, 'member_id', 'id');
    }
    public function wa_template_default()
    {
        return $this->hasOne(Wa_template_Default::class, 'member_id', 'id');
    }
    public function province()
    {
        return $this->hasOne(Province::class, 'province_id', 'propinsi');
    }
    public function city()
    {
        return $this->hasOne(City::class, 'city_id', 'kota');
    }
    public function subdistrict()
    {
        return $this->hasOne(Subdistrict::class, 'subdistrict_id', 'kecamatan');
    }
    public function themes()
    {
        return $this->hasOne(Themes::class, 'id', 'themes_id');
    }
    public function KategoriPekerjaan()
    {
        return $this->hasOne(KategoriPekerjaan::class, 'id', 'kategori_pekerjaan');
    }
    public function SubKategoriPekerjaan()
    {
        return $this->hasOne(SubKategoriPekerjaan::class, 'sub_kategori_id', 'sub_kategori_pekerjaan');
    }
    public function level_member()
    {
        return $this->hasOne(Level_member::class, 'kode', 'id');
    }
}
