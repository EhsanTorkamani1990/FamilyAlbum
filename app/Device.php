<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

   // protected $gaurd = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
