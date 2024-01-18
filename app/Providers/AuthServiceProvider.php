<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('manipulate-albums',function($user , $album) {
            return $user->id == $album->user_id;    
    });

    $this->registerPolicies();
        Gate::define('manipulate-photos',function($user , $photo) {
            return $user->id == $photo->user_id;   
    });

    $this->registerPolicies();
    
    $this->registerPolicies();
    Gate::define('manipulate-pools',function($user , $pools) {
        return $user->id == $pools->pool_id;    
    }); 

   /* $this->registerPolicies();
    Gate::define('manipulate-img',function($user , $image) {
        return $user->id == $image->user_id;    
});*/


$this->registerPolicies();
Gate::define('manipulate-ax',function($user,$image) {
    return $user->id == $image->user_id;    
}); 

$this->registerPolicies();
Gate::define('manipulate-share',function($user,$share) {
    return $user->id == $share->user_id;    
}); 
//manipulate-als

$this->registerPolicies();
Gate::define('manipulate-als',function($user,$album) {
    return $user->id == $album->user_id;    
}); 


$this->registerPolicies();
Gate::define('manipulate-post',function($user,$post) {
    return $user->id == $post->user_id;    
}); 

}
}



