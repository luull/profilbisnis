<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Themes extends Model
{
    protected $table = "themes";
    protected $guarded = ['id', 'updated'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(member::class, 'themes_id', 'id');
    }
    public function landing_page()
    {
        return $this->belongsTo(Landing_page::class, 'id', 'themes_id');
    }
}
