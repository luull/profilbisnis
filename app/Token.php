<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = "token";
    protected $guarded = ['id', 'updated'];
    public $timestamps = false;
}
