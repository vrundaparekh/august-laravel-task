<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $movies = Movies::get();
        return view ('index',compact('movies'));
    }
    public function getMovies($movie_name){

        $movies = Movies::where('slug', $movie_name)->get();
        return view('movie', compact('movies'));
    }
}
