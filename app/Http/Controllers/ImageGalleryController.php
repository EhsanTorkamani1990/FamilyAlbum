<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ImageGallery;
use Auth;
use Gate;

use App\LogActivity;

//use App\Album;
//use Auth;
////use App\Comment;
//use App\Pool;
//use App\User;
//use App\Photo;
//use Illuminate\Http\Request;
use DB;
//use Gate;




class ImageGalleryController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
    	$images = ImageGallery::get();
    	return view('image-gallery',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //
    $filenamewithExt= $request->file('image')->getClientOriginalName();
    $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
    $extension = $request->file('image')->getClientOriginalExtension();
    $filenameToStore = $filename.'_'.time().'.'.$extension ; 
    $path = $request->file('image')->storeAs('public/images2222',$filenameToStore);
    $user = Auth::user();
    if(!$user)
    {
        return redirect()->back();
    }
    $album  = new ImageGallery;
    $album->title = $request->input('title');
    //$album->description = $request->input('description');
    $album->image = $request->input('image');
    $album->image = $filenameToStore;
    //$album->save();
    $user->imagegallery()->save($album);
   //$user = Auth::user();
  // ImageGallery::create($input);
   return back()
    		->with('success','عکس با موفقیت اپلود شد ');
        /*if(!Auth::check())
        {
            return redirect()->back();
        }
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
     

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        //$input = $request->all();
       // $input['user_id'] = auth()->user()->id;
        $request->image->move(public_path('storage/images2222'), $input['image']);
      


        $input['title'] = $request->title;
        $input['user_id'] = auth()->user()->id;
        $user = Auth::user();
        if(!$user)
        {
            return redirect()->back();
        }
      
        $user->imagegallery()->save($input);
        ImageGallery::create($input);
    	return back()
    		->with('success','Image Uploaded successfully.');*/
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \LogActivity::addToLog('در حال استفاده از آلبوم');
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $image = ImageGallery::find($id);
       if(Gate::denies('manipulate-ax',$image))
        {
            return redirect()->back()->with('success','چون شما عکس رو اپلود نکردید قادر به حذف ان نمیباشید  ');;
        }
        $image->delete();
    	return back()
    		->with('success','عکس با موفقیت حذف شد ');	
    }
}