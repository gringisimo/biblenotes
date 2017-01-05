<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publication_note extends Model
{
    protected $fillable = ['user','publication_id','pub_chapter','paragraph','topic','note','book','chapter','verse'];
}