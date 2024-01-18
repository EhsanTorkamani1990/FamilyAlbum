<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


use App\LogActivity;


class SigninController extends Controller
{
    public function signin(Request $request)
    {
       //dd("Our Own Auth !");
        $this->validate($request ,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email'=> $request->input('email'),
        'password'=>$request->input('password')
        ],$request->has('remember')))
        {
           // dd("Our Own Auth !");
           //$x = $request->user->email;
           \LogActivity::addToLog('شما وارد وبسایت شدید');
            return redirect('/xs');
        }
        return redirect()->back()->with('fail','احراز هویت موفقیت امیز نبود مجددا تلاش کنید ');
    }
}
