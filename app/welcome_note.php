<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class welcome_note extends Model
{
    protected $table = "welcome_note";
    protected $fillable = ['member_id', 'welcome_note', 'judul', 'sub_judul'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
