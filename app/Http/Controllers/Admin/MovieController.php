<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    //
    public function index(){
        $movies = Movies::get();
        return view('admin.movie.index', compact('movies'));
    }
    public function createMovie(){
        return view ('admin.movie.create');
    }
    public function storeMovies(Request $request){
        
        $validator = Validator::make(
            $request->all(),
            [
                'movie_name' => 'required',
                'description' => 'required',
                'youtube_url' => 'required',
                'release_date' => 'required',
                'slug' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg',
            ]
        );

        if ($validator->fails()) {
            return response(['status' => false, 'message' => 'Invalid Data', 'error' => $validator->errors()], 422);
        }
        
        $movies = new Movies();
        $movies->movie_name = $request->movie_name;
        $movies->description = $request->description;
        $movies->youtube_url = $request->youtube_url;
        $movies->release_date = date('Y-m-d ',strtotime($request->release_date));
        $movies->slug = $request->slug;
        if ($request->hasFile('image')) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
            $movies->image  = '/storage/' . $filePath;
        }
        
        $movies->save();
        
        return response()->json(['success' => true, 'message' => 'Movie added successfully'], 200);
    }
}
