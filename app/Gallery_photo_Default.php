<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery_photo_Default extends Model
{
    protected $table = "default_gallery_photo";
    protected $fillable = ['katagori', 'keterangan', 'file_photo', 'dilihat', 'petugas'];
}
