<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Parsers\Parser;

class SiteController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $name = Auth::user()->name;
            View::share('name',$name);
        } else {
            $name = '/login';
            View::share('name',$name);
        }

        $film = Movie::get();

        return view('index', [
            'film' => $film,
        ]);



        }

    public function movie($url) {
        $url = Movie::where('url',$url)->get();

        return view('movie', [
            'url'=>$url,
        ]);
    }

    public function register() {
        return view('auth.register');
    }

    public function getmovie()
    {
        $parser = new Parser;
        $parser->getInfo();
    }


    public function profile()
    {
        return view('profile');
    }

}


