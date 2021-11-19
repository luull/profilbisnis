<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Bank_member extends Model
{
    protected $table = "bank_member";
    protected $guarded = ['id'];
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
