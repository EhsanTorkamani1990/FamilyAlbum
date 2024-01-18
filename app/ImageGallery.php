<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageGallery extends Model
{
    use SoftDeletes;
   // protected $fillable = ['user_id', 'pool_id', 'parent_id', 'caption'];
   protected $fillable = ['title','image','user_id'];
    protected $dates = ['deleted_at'];
   
   // protected $fillable = ['title','image','user_id'];
  protected $table = 'image_gallery';


   // protected $fillable = ['title','image','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
