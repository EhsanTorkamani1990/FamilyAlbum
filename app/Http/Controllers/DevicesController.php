<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Device;
use App\LogActivity;
use Auth;
 use DB;
class DevicesController extends Controller
{
    public function index(){
        if(!Auth::check())
        {
            return redirect()->back();
        }
        \LogActivity::addToLog('شما در قسمت نظر سنجی هستید ');
 
        $devices = Device::all();
 
        return view('devices.index',compact('devices'));
    }
 
    public function create(){
        if(!Auth::check())
        {
            return redirect()->back();
        }
        \LogActivity::addToLog('شما در قسمت نظر سنجی هستید ');
        return view('devices.create');
    }
 
    public function storeDevice(Request $request){
        if(!Auth::check())
        {
            return redirect()->back();
        }
        $user = Auth::user();
        if(!$user)
        {
            return redirect()->back();
        }
 
        \LogActivity::addToLog('شما در قسمت نظر سنجی هستید ');
       $this->validate($request,[
            'name' => 'required' ,
            'description'=>'required'
            //'user_id'=>'required',
          // 'cover_image' => 'required|image|max:1999'
        ]);
        $device = new Device();
 
        $device->name = request('name');
        $device->description = request('description');
        $device->user_id = auth()->user()->id;
 
       // $device->save();
        $user->devices()->save($device);
        return redirect('/devices');
 
    }

    public function destroy($id)
    {
        if(!Auth::check())
        {
            return redirect()->back();
        }else
       
        $album = Device::find($id);
        $album->delete();
        \LogActivity::addToLog('شما در قسمت نظر سنجی هستید ');
        //DB::delete('delete from als where name = ?',[$id]);
       return redirect('/devices');  
   
    }

    public function sohbat($id){
        if(!Auth::check())
        {
            return redirect()->back();
        }
        \LogActivity::addToLog('شما در قسمت نظر سنجی هستید ');
 
        $devices = Device::all();
 
        return view('devices.sohbat',compact('devices'));
    }
 
}