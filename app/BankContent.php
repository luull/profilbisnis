<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankContent extends Model
{
    protected $table = "bank_content";
    protected $guarded = ['id'];
    public $timestamps = false;
}
