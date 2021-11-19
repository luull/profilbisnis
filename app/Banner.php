<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "banner";
    protected $guarded = ['id'];
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
