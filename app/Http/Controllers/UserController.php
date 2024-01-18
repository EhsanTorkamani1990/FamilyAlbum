<?php

namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Cache;

use App\LogActivity;

class UserController extends Controller
{

    /**
     * Show user online status.
     *
     */
    public function userOnlineStatus()
    {
        \LogActivity::addToLog('شما در حال دیدن افراد آنلاین یا آفلاین هستید ');
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo "User " . $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
        return redirect('/home');    
    }
}