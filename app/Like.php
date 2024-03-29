<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{ 
    
    use SoftDeletes;

    protected $table = 'likeables';

    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    /**
     * Get all of the products that are assigned this like.
     */
    public function commennts()
    {
        return $this->morphedByMany('App\Commennt', 'likeable');
    }

    /**
     * Get all of the posts that are assigned this like.
     */
    public function possts()
    {
        return $this->morphedByMany('App\Posst', 'likeable');
    }
}
