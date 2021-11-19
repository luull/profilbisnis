<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Landing_page extends Model
{
    protected $table = "landing_page";
    protected $guarded = ['id'];
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }

    public function themes()
    {
        return $this->hasOne(Themes::class, 'id', 'themes_id');
    }
}
