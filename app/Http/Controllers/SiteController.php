<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Parsers\Parser;

class SiteController extends Controller
{
    public function index() {

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

    public function header() {
        $name = Auth::user()->name;
        return view('header',[
            'name'=>'paul',
        ]);
    }

    public function getmovie()
    {
        $parser = new Parser;
        $parser->getInfo();
    }
}


