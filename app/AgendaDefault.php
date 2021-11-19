<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaDefault extends Model
{
    protected $table = "default_agenda";
    protected $guarded = ['id'];
}
