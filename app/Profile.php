<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   // protected $guarded = [];
   protected $fillable = array('title','description','url','image');
    
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/tW4fPCDshGety3AABpdmnSDQhIrcCbDHkxKWkhgh.jpeg';
        return  '/storage/'.$imagePath; 
    }

    public function user()
    {
        return  $this->belongsTo('App\User');
    }

    public function followers()
    {
       // return $this->hasMany('App\User');
       return $this->belongsToMany('App\User');
    }
}
