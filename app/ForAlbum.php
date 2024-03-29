<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForAlbum extends Model
{
    protected $fillable = array('name');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
