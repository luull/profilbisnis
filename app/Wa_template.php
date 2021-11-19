<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Wa_template extends Model
{
    protected $table = "wa_template";
    protected $guarded = ['id'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
