<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Ph;
use Gate;
use Auth;

class PhController extends Controller
{
    public function create($al_id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        return view('phs.create')->with('al_id',$al_id);
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
       $this->validate($request,[
       'title' => 'required' ,
       'description' =>'required',
       'photo' => 'required|image|max:1999'
    ]);
 $filenamewithExt= $request->file('photo')->getClientOriginalName();
 $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
 $extension = $request->file('photo')->getClientOriginalExtension();

 $filenameToStore = $filename.'_'.time().'.'.$extension ; 
 
 $path = $request->file('photo')->storeAs('public/phs/'. $request->input('al_id'),$filenameToStore);

 $user = Auth::user();
 if(!$user)
 {
     return redirect()->back();
 }
 $photo  = new Ph;
 $photo->al_id = $request->input('al_id');
 $photo->title = $request->input('title');
 $photo->description = $request->input('description');
 $photo->size = $request->file('photo')->getClientSize();

 $photo->photo = $filenameToStore;

 $user->phs()->save($photo);

 return redirect('/als/'.$request->input('al_id'))->with('success','عکس اپلود شد');    
    }

    public function show($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $photo = Ph::find($id);
        return view('phs.show')->with('photo',$photo);
    }

   public function destroy($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $photo = Ph::find($id);
     
        if(storage::delete('public/phs/'.$photo->al_id.'/'.$photo->photo))
        {
            $photo->delete();
            return redirect('/')->with('success' ,'عکس با موفقیت حذف شد');
        }
    }
}
