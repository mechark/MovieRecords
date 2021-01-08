<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $retrieval = $request->get('retrieval');
        $movie = new Movie;
        $retrievaled = [];



        foreach ($movie->where('name','ILIKE','%' . $retrieval . '%')->get() as $retrieval)
        {
            array_push($retrievaled, $retrieval);
        }

//        foreach ($movie->pluck('name') as $name)
//        {
//
//            if (str_starts_with($name, $retrieval))
//            {
//
//                array_push($retrievaled,$movie->where('name', $name)->get());
//
//            }
//
//        }

        if(!empty($retrievaled))
        {

            View::share('retrievaled',$retrievaled);

        } else {
            $retrievaled = [' '];
            View::share('retrievaled',$retrievaled[0]);
        }
        return view('search');

    }
}
