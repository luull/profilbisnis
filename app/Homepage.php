<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    protected $table = "homepage";
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
