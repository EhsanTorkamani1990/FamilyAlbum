<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ph extends Model
{
    protected $fillable = array('al_id','description' ,'photo', 'title','size');

    public function als()
    {
        return $this->belongsTo('App\Al');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
