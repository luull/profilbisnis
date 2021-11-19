<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerDefault extends Model
{
    protected $table = "default_banner";
    protected $guarded = ['id'];
}
