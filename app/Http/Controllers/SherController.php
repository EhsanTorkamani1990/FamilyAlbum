<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SherController extends Controller
{
    public function sher(Request $request)
    {
       //dd("Our Own Auth !");
        $this->validate($request ,[
            'title' => 'required',
            'body' => 'required'
        ]);
    
     
        return redirect()->back()->with('sher','احراز هویت موفقیت امیز نبود مجددا تلاش کنید ');
    }
}
