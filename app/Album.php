<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Photo;

class Album extends Model
{
    use SoftDeletes;
    protected $fillable = array('name','name_alex' , 'description' , 'cover_image');

    //use SoftDeletes;
    
   // protected $fillable = ['user_id', 'pool_id', 'parent_id', 'caption'];
   
    protected $dates = ['deleted_at'];
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function for_albums()
    {
        return $this->hasMany('App\ForAlbum');
    }


  
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
}
