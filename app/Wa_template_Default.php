<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wa_template_Default extends Model
{
    protected $table = "default_wa_template";
    protected $guarded = ['id'];
    public $timestamps = false;
    
}
