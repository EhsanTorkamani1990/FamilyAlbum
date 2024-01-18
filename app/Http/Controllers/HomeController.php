<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\LogActivity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

   /* public function users()
    {
        $users = User::get();
        return view('users', compact('users'));
    }


    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
     
    public function user($id)
    {
        $user = User::find($id);
        return view('usersView', compact('user'));
    }


    /**
     * Show the application of itsolutionstuff.com.
     *
     * @return \Illuminate\Http\Response
    
    public function ajaxRequest(Request $request){


        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);


        return response()->json(['success'=>$response]);
    } */

    public function myTestAddToLog()
    {
        \LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }

    public function logActivity2()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity2',compact('logs'));
    }

    public function logActivity3()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity3',compact('logs'));
    }
}
