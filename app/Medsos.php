<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Medsos extends Model
{
    protected $table = "medsos";
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
