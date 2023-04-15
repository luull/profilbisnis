<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = "landing";
    protected $guarded = ['id'];
    public $timestamps = false;
}
