<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kartu_nama extends Model
{
    protected $table = "kartu_nama";
    protected $guarded = ['id'];
    public $timestamps = false;
    public function member()
    {
        return $this->belongsTo(member::class, 'kartu_nama_id', 'id');
    }
}
