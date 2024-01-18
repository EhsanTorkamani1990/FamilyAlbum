<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Al extends Model
{
    use SoftDeletes;
   // protected $fillable = array('name','name_alex' , 'description' , 'cover_image');
   protected $fillable = array('name', 'description' , 'cover_image');
    //use SoftDeletes;
    
   // protected $fillable = ['user_id', 'pool_id', 'parent_id', 'caption'];
   
    protected $dates = ['deleted_at'];
   // protected $fillable = array('name', 'description' , 'cover_image');

    public function phs()
    {
        return $this->hasMany('App\Ph');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
