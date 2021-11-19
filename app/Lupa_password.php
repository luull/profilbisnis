<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lupa_password extends Model
{
    protected $table = "lupa_password";
    public $timestamps = false;
    protected $guard = ['id'];
}
