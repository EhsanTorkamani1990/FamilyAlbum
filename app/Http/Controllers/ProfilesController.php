<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Pool;
use App\User;
use Cache;
use Auth;
use App\LogActivity;

//use App\User;
//use App\Photo;
//use Illuminate\Http\Request;
use DB;
use Gate;

//use App\NewUserWelcomeMail;
class ProfilesController extends Controller
{
    
//use \Cache;
    public function index(User $user)
    {
        \LogActivity::addToLog('شما در حال استفاده از پروفایل کاربری هستید ');
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $poolCount = Cache::remember(
            'count.pools' . $user->id , 
            now()->addSeconds(30) ,
            function () use ($user) {
            return $user->pools->count();
        }); 

        $followersCount =Cache::remember(
            'count.pools' . $user->id , 
            now()->addSeconds(30) ,
            function () use ($user) {
            return $user->profile->followers->count();
        });  

        $followingCount = Cache::remember(
            'count.pools' . $user->id , 
            now()->addSeconds(30) ,
            function () use ($user) {
            return $user->following->count();
        });

       // dd($follows);
        return view('profiles.index',compact('user','follows','poolCount','followersCount','followingCount'));
    }
    public function edit(User $user)
    {
        \LogActivity::addToLog('شما در حال استفاده از پروفایل کاربری هستید ');
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {
        \LogActivity::addToLog('شما در حال استفاده از پروفایل کاربری هستید ');
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);
       if(request('image'))
       {
            $imagePath = request('image')->store('profile','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath];
       }
     
       auth()->user()->profile->update(array_merge(
           $data,
           $imageArray ?? []
       ));
       return redirect("/profile/{$user->id}");
    }

    public function destroy($caption) {
        \LogActivity::addToLog('شما در حال استفاده از پروفایل کاربری هستید ');
        if(!Auth::check())
        {
            return redirect()->back();
        }else
        //$comments = Comment::find($id);
        /* if(Gate::denies('manipulate-ax',$image))
         {
             return redirect()->back()->with('success','چون شما عکس رو اپلود نکردید قادر به حذف ان نمیباشید  ');;
         }*/
        //$comments->delete();
        //DB::SoftDeletes('SoftDeletes from comments where caption = ?',[$id]);
        // $xs = Comment::all();
        // $xn = $xs->id;
        $post = Pool::find($caption);
        $post->delete();
        return back()
             ->with('success','');
        //$post = Comment::find($id);
        //$post->delete();
        //Comment::find()->where('caption','=',$id) ->delete();
        //data = Post::find(1)->delete();
        //DB::delete('delete from comments where caption = ?',[$id]);
        //return redirect('/')->with('success','کامنت با موفقیت حذف شد'); 
        //return view('profiles.index')->with('comments',$model);    
        /*if(!Auth::check())
        {
            return redirect()->back();
        }else
       
       // $album = Pool::with('pools')->find($id);
        DB::delete('delete from pools where caption = ?',[$id]);
     
      //  echo "Record deleted successfully.<br/>";
       // echo '<a href = "/albums">Click Here</a> to go back.';
       return redirect('/')->with('success','عکس اینستاگرام مورد نظر شما با موفقیت حذف گردید '); */    
     }
}
