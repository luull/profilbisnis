<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welcome_note_default extends Model
{
    protected $table = "default_welcome_note";
    protected $fillable = ['welcome_note', 'judul', 'sub_judul'];
    public $timestamps = false;
}
