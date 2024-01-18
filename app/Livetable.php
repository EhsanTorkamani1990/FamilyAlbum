<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Livetable extends Model
{

   use SoftDeletes;

    protected $fillable = array('first_name','last_name');
}
