<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YoutubeDefault extends Model
{
    protected $table = "default_youtube";
    protected $fillable = ['kategori', 'judul', 'id_youtube', 'petugas', 'dilihat'];
}
