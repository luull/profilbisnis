<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_token extends Model
{
    protected $table = "bill_token";
    protected $guarded = ['id', 'updated'];
    public $timestamps = false;
}
