<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Controllers\Parser1;

class MovieController extends Controller
{
    public function addMovie()
    {

        $parser = new Parser1;
        return $parser->sprint('Hello');

    }
}
