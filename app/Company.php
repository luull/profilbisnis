<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company";
    protected $guarded = ['id'];
    public $timestamps = false;
    public function subdistrict()
    {
        return $this->hasOne(Subdistrict::class, 'subdistrict_id', 'kecamatan');
    }
    public function city()
    {
        return $this->hasOne(city::class, 'city_id', 'kota');
    }
    public function province()
    {
        return $this->hasOne(province::class, 'province_id', 'propinsi');
    }
}
