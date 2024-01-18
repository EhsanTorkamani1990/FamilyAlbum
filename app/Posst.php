<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Posst extends Model
{
    
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $gaurd = [];
    //protected $fillable = array('caption','image','user_id');
    //protected $fillable = array('title','body');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function commennts()
    {
        return $this->morphMany('App\Commennt', 'commentable')->whereNull('parent_id');
    }
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function getIsLikedAttribute()
    {
        $like = $this->likes()->whereUserId(Auth::id())->first();
        return (!is_null($like)) ? true : false;
    }
}
