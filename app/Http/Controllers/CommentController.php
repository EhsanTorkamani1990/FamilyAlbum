<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Comment;
use App\Pool;
//use App\User;
use Auth;
//use App\User;
//use App\Photo;
//use Illuminate\Http\Request;
use DB;
use Gate;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'caption'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();
    }

    
    public function destroycc($caption)
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
       $post = Comment::find($caption);
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
    }

}
