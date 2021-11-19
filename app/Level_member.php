<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level_member extends Model
{
    protected $table = "level_member";
    protected $guarded = ['id'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(Member::class, 'kode', 'level');
    }
}
