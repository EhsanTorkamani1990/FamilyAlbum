<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Pool;
//use App\Post;
//use Auth;
//use App\Comment;
//use App\Pool;

//use DB;
use Auth;
use App\Post;
use App\Commennt;


use DB;
use Gate;


   
class PostController extends Controller
{
    public function getDashboard()
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }


        
        $posts = Post::all();
       // return view('dashboard')->with('posts',$posts);
        //$posts = Post::all()->get();
     return view('dashboard',['posts' => $posts]);
      //return view('dashboard')->with('posts',$posts); 
    }

    public function postCreatePost(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $this->validate($request,[
            'body' =>'required|max:1000',
        ]);
        //Validation
        $post = new Post();
        $post->body = $request['body'];
  
       // $message = '<script>alert("شاید مشکل اینه اینپوت خالی است !!!!!!!")</script>';
        //echo '<script>alert("شاید مشکل اینه اینپوت خالی است !!!!!!!")</script>'
       // echo "$message";
        //if($post == null)
       // {
           // return redirect()->back();
       // }
       $message ='There was an error';
    if( $request->user()->posts()->save($post))
       {
         $message =  '<script>alert("شعر شما ساخته شد !")</script>' ;
         echo "$message";
        }

      // $request->user()->posts()->save($post);
    
        return view('dashboard')->with(['message' => $message]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $pools = Pool::all();
    
        return view('pools.index', compact('pools'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pools.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
    	$request->validate([
           // 'title'=>'required',
            'caption'=>'required',
        ]);
    
        Pool::create($request->all());
    
        return redirect()->route('pools.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
    	$pool = Pool::find($id);
        return view('pools.show', compact('pool'));
    }
    public function destroysher($id) {
    
        if(!Auth::check())
        {
            return redirect()->back();
        }else
        DB::delete('delete from posts where id = ?',[$id]);
        return redirect('/aghajoon')->with('success','شعر حذف شد ');     
     }

      /*public function getDeletePost($id)
     {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        //$post = Post::find($post_id);
       // $post->delete();
        //return view('dashboard')->with('message','successfully Deleted');
        DB::delete('delete from posts where id = ?',[$id]);
       return redirect('/')->with('success','کامنت با موفقیت حذف شد');    
     }
    public function destroycc($id)
     {
        if(!Auth::check())
        {
            return redirect()->back();
        }else
       
        //$comment = Comment::with('comments')->find($id);
        DB::delete('delete from comments where caption = ?',[$id]);
       return redirect('/')->with('success','کامنت با موفقیت حذف شد');     
     }*/
     public function getPost(){
    	$posts = DB::table('posts')
    			->join('users', 'users.id', '=', 'posts.userid')
    			->select('posts.id as postid', 'posts.*', 'users.id as userid', 'users.*')
    			->orderBy('posts.created_at', 'desc')
    			->get();
 
		return view('postlist', compact('posts'));
    }
 
    public function post(Request $request){
    	if ($request->ajax()){
    		$user = Auth::user();
	    	$post = new Post;
 
	    	$post->userid = $user->id;
	    	$post->post = $request->input('post');
 
	  		$post->save();
 
    		return response($post);
    	}
    }
 
    public function getComment(Request $request){
        if ($request->ajax()){
           $comments = DB::table('comments')
                    ->join('users', 'users.id', '=', 'comments.userid')
                    ->select('comments.id as commentid', 'comments.*', 'users.id as userid', 'users.*')
                    ->where('postid', '=', $request->id)
                    ->get();
 
            return view('commentlist', compact('comments'));
        }
    }
 
    public function makeComment(Request $request){
        if ($request->ajax()){
            $user = Auth::user();
            $comment = new Commennt;
 
            $comment->userid = $user->id;
            $comment->postid = $request->postid;
            $comment->comment = $request->commenttext;
 
            $comment->save();
 
            return response($comment);
        }
    }
}
