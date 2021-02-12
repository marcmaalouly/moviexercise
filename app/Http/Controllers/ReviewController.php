<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewModel;
class ReviewController extends Controller
{
    //
    function getReviews($movieid){
        $review=new ReviewModel();
        $review=ReviewModel::where('movie_id','=',$movieid)->get();
        return compact('review');
    }
    function AddReview(Request $request,$movieid){
        $title=$request->input('title');
        $description=$request->input('description');
        $userid=session('userid');
        $review=new ReviewModel();
        $review->title=$title;
        $review->description=$description;
        $review->user_id=$userid;
        $review->movie_id=$movieid;
        $review->reviewDate=now();
        $review->save();
        return view('login');
    }
    function ReroutAddReview($id){
        return view('Addreview',['movieid'=>$id]);
    }
}
