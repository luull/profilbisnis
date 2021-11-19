<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $table="youtube";
    protected $fillable=['member_id','kategori','judul','id_youtube','petugas','dilihat'];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
