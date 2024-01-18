<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
  
class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['user_id', 'pool_id', 'parent_id', 'caption'];
   
    protected $dates = ['deleted_at'];
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
   
    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
}
