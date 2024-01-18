<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use  intervention\Image\Facades\Image;

use Intervention\Image\ImageManagerStatic as Image;

use App\Pool;
use App\User;
use App\Like;
use Auth;
use App\LogActivity;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        
        $users = auth()->user()->following()->pluck('profiles.user_id');
        //$pools = Pool::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
       $pools = Pool::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
       // dd($pools);
       return view('pools.index',compact('pools'));
    }
    public function create()
    {
        return view('pools.create');
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'caption'=>'required',
            'image' =>['required','image'],
        ]);

        //dd(request('image')->store('uploads','public'));
        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        auth()->user()->pools()->create([
            'caption' => $data['caption'],
            'image' => $imagePath ,
        ]);
        //dd(request()->all());
        return redirect('/profile/'. auth()->user()->id);
    }
    public function show(\App\Pool $pool)
    {
        return view('pools.show',compact('pool'));
    }
    /*public function finduser()
    {
      $users = User::all();
        echo '<center>'.'<a  href='.'"https://torkamani.org"'.'></center>';
        echo 'دوست عزیز سلام  لطفا ای دی شخص مورد نظر را جای ایدی خودتان در بالای ادرس بار قرار دهدید';
        echo '<br>';
        echo 'torkamani.org/profile/id';
        echo '<br>';
        echo 'ای دی شخص مورد نظرتان را وارد کنید و او را فالو کنید';
        echo '<br>';
        return $users .'<br>';
    }*/

    /*public function isLikedByMe($id)
    {
    $pool = Pool::findOrFail($id)->first();
    if (Like::whereUserId(Auth::id())->wherePoolId($pool->id)->exists()){
        return 'true';
    }
    return 'false';
    }

    public function like(Pool $pool)
    {
        $existing_like = Like::withTrashed()->wherePoolId($pool->id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'pool_id' =>$pool->id,
                'user_id' => Auth::id()
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
            } else {
                $existing_like->restore();
            }
        }
    }*/
}
