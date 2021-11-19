<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $table = "app_setting";
    protected $guarded = ['id'];
    public $timestamps = false;
}
