<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pool extends Model
{

    use SoftDeletes;
  
    protected $fillable = array('caption','image','user_id');
    
    protected $dates = ['deleted_at'];

   //protected $fillable = array('caption','image','user_id');
   // protected  $gaurded = [];
   //protected $gaurded =[];
    public function comments()
    {
        return $this->hasMany('App\Comment')->whereNull('parent_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /*public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }*/

}
