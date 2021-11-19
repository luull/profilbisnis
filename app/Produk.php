<?php

namespace App;

use App\Bisnis;
use App\Member;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    protected $guarded = ['id'];
    public $timestamps = false;
    public function bisnis()
    {
        return $this->belongsTo(Bisnis::class, 'id', 'bisnis_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'id', 'member_id');
    }
    public function testimoni()
    {
        return $this->hasMany(Testimoni::class, 'produk_id', 'id');
    }
}
