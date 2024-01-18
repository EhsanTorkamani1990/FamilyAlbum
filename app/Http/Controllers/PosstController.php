<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posst;
use App\User;


use App\LogActivity;


use App\Commennt;
use DB;

use App\Like;
use Auth;
use Gate;
use Redirect;

class PosstController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        \LogActivity::addToLog('شما وارد شعر ها شدید');
        //$posts = Posst::all();
        $users = auth()->user()->pluck('id');
       //$pools = Pool::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
       //$pools = Pool::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        $posts = Posst::whereIn('user_id',$users)->with('user')->latest()->paginate(5);
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('post');
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }

        $user = Auth::user();
        if(!$user)
        {
            return redirect()->back();
        }

        $post =  new Posst;
        $post->first_name= $request->get('first_name');
        $post->last_name = $request->get('last_name');
       // $post->body = "<p>I will display &#x1F308;</p>";
        //$post->user_id= $request->get('user_id');
        //$input['user_id'] = auth()->user()->id;
        $post->user_id  = auth()->user()->id;
        //$post->save();
        //echo implode(' ', $post);
        $user->possts()->save($post);
        \LogActivity::addToLog('شما شعر گفتید ');
        return redirect('posts');


    }

    public function show($id)
    {
        $post = Posst::find($id);
        \LogActivity::addToLog('شما شعر یک کاربر رادیدید');

        return view('show', compact('post'));
    }

    /*public function edit(Posst $post)
    {
      
        return view('edit');
        //return redirect()->view('edit',compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->possts);
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
            //'url' => 'url',
            //'image' => '',
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
       return redirect("/posts/{$post->id}");
    }*/

    public function edit($id)
    {
    $post = Posst::find($id);
    \LogActivity::addToLog('شما وارد قسمت ویرایش شدید');
    return view('edit')->with('post',$post);



    }

    public function update(Request $request,$id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }

        $user = Auth::user();
        if(!$user)
        {
            return redirect()->back();
        }

       //$post =  new Posst;
        $post = Posst::find($id);
        //$post->id =$user->post()->id;
        $title = $request->get('first_name');
        $body =$request->get('last_name');
        $post->first_name = $title;
        $post->last_name = $body;
        $post->user_id  = auth()->user()->id;
        //$post->title = $request->input('title');
        //$post->body = $request->input('body');
        // $post->save();
        $user->possts()->save($post);
        //return view('edit')->with('post' , Posst::all());
        return Redirect::to('/posts')->with('post' , Posst::all());

        \LogActivity::addToLog('شما یک شعر را ویرایش کردید');
       // return redirect()->to('{{ route("post.show") }}')->with('post' , Posst::all());
       //return view('show');
       //return view('show')->with('post' ,Posst::all)
     //  return view('/post/show/{{ $post->id }}')->with('post' , Posst::all());
    }

    public function likePost($id)
    {
        // here you can check if product exists or is valid or whatever
        
        $this->handleLike('App\Posst', $id);
        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        \LogActivity::addToLog('شما لایک یا آنلایک کردید');
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
             
                $existing_like->delete();
                \LogActivity::addToLog('شما لایک یا آنلایک کردید');
               // \LogActivity::addToLog('شما یک شعر را انلایک کردید');
            } else {
                \LogActivity::addToLog('شما لایک یا آنلایک کردید');
                $existing_like->restore();
            }
        }
    }

    public function likePost2($id)
    {
        
        // here you can check if product exists or is valid or whatever
        $this->handleLike('App\Commennt', $id);
        return redirect()->back();
    }

    public function handleLike2($type, $id)
    {
      
        
      // \LogActivity::addToLog('شما یک کامنت را لایک کردید');
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
        } else {
            if (is_null($existing_like->deleted_at)) {
                \LogActivity::addToLog('شما لایک یا آنلایک کردید');
                $existing_like->delete();

            } else {
                \LogActivity::addToLog('شما لایک یا آنلایک کردید');
                $existing_like->restore();
       
            }
        }
        \LogActivity::addToLog('شما لایک یا آنلایک کردید');
    }

    public function vorod()
    {
        return view('vorod');
    }
  





    /* something  else*/

    function fetch_data(Request $request,$id)
    {
        if($request->ajax())
        {
            $data = DB::table('possts')->orderBy('id','desc')->where('id',[$id])->get();
            echo json_encode($data);
        }
    }

    function add_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                'first_name'    =>  $request->first_name,
                'last_name'     =>  $request->last_name
            );
            $id = DB::table('possts')->insert($data);
            if($id > 0)
            {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        } 
    }

    function update_data(Request $request)
    {
        if($request->ajax())
        {
            $data = array(
                $request->column_name       =>  $request->column_value
            );
            DB::table('possts')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">Data Updated</div>';
        }
    }

    function delete_data(Request $request)
    {
        if($request->ajax())
        {
            DB::table('possts')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    }
    


}
