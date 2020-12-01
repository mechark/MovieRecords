<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function profile() {
        if (Auth::check())
        {
            $name = Auth::user()->name;
            return view('profile',[
                'name'=>$name,
            ]);
        }


    }
}
