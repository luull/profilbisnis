<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $table = "subdistrict";
    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'kecamatan', 'subdistric_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'kecamatan', 'subdistric_id');
    }
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }
}
