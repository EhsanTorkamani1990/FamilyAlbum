<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use Gate;
use Auth;

class PhotosController extends Controller
{
    public function create($album_id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        return view('photos.create')->with('album_id',$album_id);
    }

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
          // return "hi all everybody";
       $this->validate($request,[
       'title' => 'required' ,
       'description' =>'required',
      'photo' => 'required|image|max:1999'
    ]);
    //get file name with extension 
 $filenamewithExt= $request->file('photo')->getClientOriginalName();

 //get just the file name
 $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
// return $filename;
//get extension
     $extension = $request->file('photo')->getClientOriginalExtension();
   //  return $extension;
   //create new filename;
   $filenameToStore = $filename.'_'.time().'.'.$extension ; 
  // return $filenameToStore;
  //upload image
 // $path = $file->$request
 $path = $request->file('photo')->storeAs('public/photos/'. $request->input('album_id'),$filenameToStore);
 //return $path;
 $user = Auth::user();
 if(!$user)
 {
     return redirect()->back();
 }
 $photo  = new Photo;
 $photo->album_id = $request->input('album_id');
 $photo->title = $request->input('title');
 $photo->description = $request->input('description');
 $photo->size = $request->file('photo')->getClientSize();
 //$album->cover_image = $request->input('cover_image');
 $photo->photo = $filenameToStore;
 //$photo->save();
 $user->photos()->save($photo);

 return redirect('/albums/'.$request->input('album_id'))->with('success','عکس اپلود شد');    
    }

    public function show($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
    }

   public function destroy($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $photo = Photo::find($id);
       /* if(Gate::denies('manipulate-albums',$photo))
        {
            return redirect()->back()->with('success','دوست عزیز این البوم برای شما نیست برای چی قصد حذف ان را دارید  لطفا دقت کنید ');
        }*/
        if(storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo))
        {
            $photo->delete();
            return redirect('/')->with('success' ,'عکس با موفقیت حذف شد');
        }
    }
}
