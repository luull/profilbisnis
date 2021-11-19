<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Blog_member extends Model
{
    protected $table = "blog_member";
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
