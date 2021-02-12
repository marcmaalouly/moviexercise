<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovieModel;
use App\Http\Controllers\ReviewController;

class MovieController extends Controller
{
    public function getMovies(){
        $movie=new MovieModel();
        $movie=MovieModel::all();
        return view('welcome',compact('movie'));
    }
    public function searchMovie(Request $request){
        $movieinfo=$request->input('movieinfo');
        $movie=new MovieModel();
        $movie=MovieModel::where('movie_title','LIKE','%'.$movieinfo.'%')->get();
        return view('welcome',compact('movie'));
    }
    public function infoMovie(Request $request,$id){
        $movie=new MovieModel();
        $movie=MovieModel::where('id','=',$id)->first();
        $movietitle=$movie->movie_title;
        $productionyear=$movie->productionYear;
        $thumbnail=$movie->thumbnail;
        $duration=$movie->duration;
        $genre=$movie->genre;
        $synopsis=$movie->synopsis;
        $description=$movie->description;
        $reviewController=new ReviewController;
        $review=$reviewController->getReviews($id);
        return view('movieInfo',compact('movie'),['review'=>$review]);
    }
    public function createMovie(Request $request){
        
        $title=$request->input('mname') ;
        $Duration =$request->input('duration') ;
        $productionYear =$request->input('year') ;
        $Synopsis =$request->input('synopsis') ;
        $Genre =$request->input('genre') ;
        $description=$request->input('description');
        $thumbnail= $request->file('thumbnail')->getClientOriginalName();
        $file = $request->file('thumbnail');
        move_uploaded_file( $_FILES['thumbnail']['tmp_name'], "uploads/".$thumbnail);

        $Movie=New MovieModel();
        $Movie->movie_title=$title ;
        $Movie->duration=$Duration ;
        $Movie->description=$description;
        $Movie->productionYear=$productionYear ;
        $Movie->thumbnail=$thumbnail;
        $Movie->synopsis=$Synopsis ;
        $Movie->genre=$Genre;
    
    
        $saved=  $Movie -> save();
    
        if(!$saved){
            App::abort(500, 'Movie not created ');
        }
        else {
            echo '<script>' ;
            echo 'alert("Movie is created ")';
            echo '</script>';
            return view('welcome')  ;
        }
    }
}
