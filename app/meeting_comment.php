<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class meeting_comment extends Model
{
    protected $fillable = ['user','date','article','paragraph','topic','comment','book','chapter','verse'];
}
