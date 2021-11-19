<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda";
    protected $guarded = ['id'];
    public function member()
    {
        return $this->belongsTo(member::class, 'id', 'member_id');
    }
}
