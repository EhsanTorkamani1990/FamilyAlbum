<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Al;
use Auth;
use DB;
use App\LogActivity;
use Gate;

class AlController extends Controller
{
    public function index()
    { 

        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $album = Al::with('phs')->get();
        return view('als.index')->with('als',$album);  
    }
  

    public function create()
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        return view('als.create');
    }

    public function store(Request $request)
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
       $this->validate($request,[
           'name' => 'required' ,
           'description'=>'required',
           'cover_image' => 'required|image|max:1999'
       ]);

       
    $filenamewithExt= $request->file('cover_image')->getClientOriginalName();
    $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
    $extension = $request->file('cover_image')->getClientOriginalExtension();
    $filenameToStore = $filename.'_'.time().'.'.$extension ; 
    $path = $request->file('cover_image')->storeAs('public/albums_coversals',$filenameToStore);
    $user = Auth::user();
    if(!$user)
    {
        return redirect()->back();
    }
    $album  = new Al;
    $album->name = $request->input('name');
    $album->description = $request->input('description');
    $album->cover_image = $request->input('cover_image');
    $album->cover_image = $filenameToStore;
    $user->als()->save($album);
    return redirect('/als')->with('success','آلبوم ساخته شد ');    
    }

    public function show($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $album = Al::with('phs')->find($id);
       return view('als.show')->with('als',$album);
    }
   
    public function destroy($id) {
    
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }else
       
        $album = Al::with('phs')->find($id);
        $album->delete();
        //DB::delete('delete from als where name = ?',[$id]);
       return redirect('/')->with('success','آلبوم با موفقیت حذف شد ');     
     }
}

