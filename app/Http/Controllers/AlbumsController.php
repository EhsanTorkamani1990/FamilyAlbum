<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;
use Auth;
use App\Comment;
use App\Pool;
//use App\Livetable;
use DB;
use Gate;
use App\ForAlbum;
use App\LogActivity;

class AlbumsController extends Controller
{
    public function index()
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $album = Album::with('photos')->get();
        return view('albums.index')->with('albums',$album);  
    }
   

    public function create()
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        return view('albums.create');
    }

    public function store(Request $request)
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
 
       $this->validate($request,[
        //'selection' => 'required',
           'name' => 'required' ,
           'name_alex' => 'required' ,
           'description'=>'required',
          'cover_image' => 'required|image'
       ]);
    $filenamewithExt= $request->file('cover_image')->getClientOriginalName();
    $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
    $extension = $request->file('cover_image')->getClientOriginalExtension();
    $filenameToStore = $filename.'_'.time().'.'.$extension ; 
    $path = $request->file('cover_image')->storeAs('public/albums_covers',$filenameToStore);
    $user = Auth::user();
    if(!$user)
    {
        return redirect()->back();
    }
    $album = new Album;
  
    $album->name = $request->input('name');
  
    $album->name_alex =$request->input("name_alex");
    

    $album->description = $request->input('description');
    $album->cover_image = $request->input('cover_image');
    $album->cover_image = $filenameToStore;
    //$album->save();
    $user->albums()->save($album);
  
   // $user->albums()->save($album);
   //$user = Auth::user();
    return redirect('/albums')->with('success','البوم با موفقیت با کاربر به اشتراک گذاشته شد ');    
    }
    
    public function destroy($id) {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }else
       
       $album = Album::with('photos')->find($id);
       // DB::delete('delete from albums where description = ?',[$id]);
       $album->delete();
       return redirect('/')->with('success','البوم  با موفقیت حذف شد');     
     }

     public function show($id)
     {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
         if(!Auth::check())
         {
             return redirect()->back();
         }
         $album = Album::with('photos')->find($id);
        return view('albums.show')->with('albums',$album);
     }

     public function taghi(Request $request)
     {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        
       $this->validate($request,[
       
           'name22' => 'required' ,     
       ]);
   
  $user = Auth::user();
    if(!$user)
    {
        return redirect()->back();
    }
    
    $albums = new ForAlbum;
   
    $albums->name22 = $request->input('name22');

    


    $user->for_albums()->save($albums);

    $albums = new ForAlbum;
   $albums = DB::table('for_albums')
        ->join('albums', 'for_albums.user_id','=','albums.user_id')
        //->where('for_albums.user_id','=','albums.id')
        ->select('albums.name_alex','for_albums.name22')
        ->get();
echo "<a href='/join-table1369'>برگرد به گالری من</a>";
echo "</br>";
echo "<a href='/beta'>نمونه ای دیگر از جوین </a>";
  dd($albums);

    return redirect('/albums')->with('albums',$albums);
     }  
     
     public function negar()
     {
        if(!Auth::check())
        {
            return redirect()->back();
        }
     
         $user = new User();
        $users = DB::table('users')->get();

        foreach ($users as $user)
        {
            var_dump($user->name);
        }
     }
     public function negar2()
     {
         //$user = new User();
         if(!Auth::check())
         {
             return redirect()->back();
         }
  

        $users = DB::table('users')->where('name','t3')->get();

       
        foreach ($users as $user)
        {
            var_dump($user->name);
        }
       
     }

     public function negar3()
     {
        if(!Auth::check())
        {
            return redirect()->back();
        }
     
        //$user = new User();
       // $names = new User();
        $names = DB::table('users')->where('name', 't3')->pluck('name');
        //$users = DB::table('users')->where('name','t3')->get();

       
        foreach ($names as $name)
        {
            var_dump($name->name);
        }
       
     }
     public function destroynx($idx)
      {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }else
       
        //$album = ForAlbum::find($idx);
        DB::delete('delete from for_albums where name22 = ?',[$idx]);

        return redirect('/')->with('success','البوم  با موفقیت حذف شد');     
     }

    function index1369()
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
       // $album = Album::with('photos')->get();
       // return view('albums.index')->with('albums',$album);  

        //$data = new Album;
        //$data = Album::with('photos')->get();
        $data = DB::table('for_albums')
        ->join('albums', 'for_albums.user_id','=','albums.user_id')
        ->select('albums.name_alex','for_albums.name22')
        ->get();

        return view('join_table1369', compact('data')); 
    }

    public function usersGet()
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $users =DB::table('for_albums')
        ->join('albums', 'for_albums.user_id','=','albums.user_id')
        ->select('albums.name_alex','for_albums.name22')
        ->get()
->toArray();    	

            echo '<pre>';
            echo "</br>";
            echo "<a href='/join-table1369'>برگرد به گالری من</a>";
echo "</br>";
            print_r($users);
            exit;
    }


   

}




