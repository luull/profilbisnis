<?php

namespace App;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Gallery_photo extends Model
{
    protected $table = "gallery_photo";
    protected $fillable = ['member_id', 'katagori', 'keterangan', 'file_photo', 'dilihat', 'petugas'];
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
}
