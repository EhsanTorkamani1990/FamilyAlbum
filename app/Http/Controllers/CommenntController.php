<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Commennt;
use App\Posst;
use Auth;
use DB;
use App\User;

use App\LogActivity;

class CommenntController extends Controller
{
  
    public function store(Request $request)
    {
        //$users = auth()->user()->pluck('id');
        //$pools = Pool::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
        //$pools = Pool::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        // $posts = Posst::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
         //return view('index', compact('posts'));
        //$users = auth()->user()->pluck('id');
        $comment = new Commennt;
        $comment->body = $request->get('comment_body');
        if($comment->body == null)
        {
            return redirect()->back();
        }
        $comment->parent_id = $request->get('comment_id');
        $comment->user()->associate($request->user());
        $post = Posst::find($request->get('post_id'));
        
       // $comment = Posst::whereIn('user_id',$comment->user->id)->with('user')->latest()->paginate(5);
        //$pools = Pool::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        $post->commennts()->save($comment);
        \LogActivity::addToLog('شما در قسمت شعر برای یک کاربر کامنت گذاشتید  ');

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new Commennt();
        $reply->body = $request->get('comment_body');
        if($reply->body == null)
        {
            return redirect()->back();
        }
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $post = Posst::find($request->get('post_id'));

        //$post = Commennt::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        $post->commennts()->save($reply);
        \LogActivity::addToLog('شما یک کامنت را ریپلای کردید');
        return back();

    }

    public function destroy($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }else
       
        $album = Posst::find($id);
        $album->delete();
        \LogActivity::addToLog('شما یک شعر را حذف کردید');
        //DB::delete('delete from als where name = ?',[$id]);
       return redirect('/posts');  
   
    }

    public function destroycc($id)
    {
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
       $post = Commennt::find($id);
       $post->delete();
       \LogActivity::addToLog('شما یک کامنت را حذف کردید');
       return back()
    		->with('success','');
       //$post = Comment::find($id);
       //$post->delete();
       //Comment::find()->where('caption','=',$id) ->delete();
       //data = Post::find(1)->delete();
       //DB::delete('delete from comments where caption = ?',[$id]);
       //return redirect('/')->with('success','کامنت با موفقیت حذف شد'); 
       //return view('profiles.index')->with('comments',$model);    
    }
}
