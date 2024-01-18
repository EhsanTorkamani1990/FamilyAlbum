<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commennt extends Model
{
   // protected $fillable = ['user_id',  'body','commentable_id','commentable_type'];
   use SoftDeletes;
    
   // protected $fillable = ['user_id', 'pool_id', 'parent_id', 'caption'];
   
    protected $dates = ['deleted_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Commennt', 'parent_id');
    }

    public function likes2()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }
}
