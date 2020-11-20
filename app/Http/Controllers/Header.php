<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Header extends Controller
{

    public function __construct() {
        Auth::logout();
}

    public function header() {
        $name = Auth::user()->name;
        return view('header',[
            'name'=>$name,
        ]);
    }
}
