<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\MovieModel;
use App\Http\Controllers\MovieController;
class UserController extends Controller
{
    //
    function getuserReview($userid){
        $user=new UserModel();
        $user=UserModel::where('id','=',$userid)->first();
        return compact('user');
    }
    function loginUser(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        $user= new UserModel();
        $user=UserModel::where('Email','=',$email)->first();
        if($user->Password==$password){
            session(['userid'=>$user->id]);
            $movie=new MovieModel();
            $movie=MovieModel::all();
            if($user->role_id==2){
                session(['role'=>'Admin']);
                return view('adminpage',compact('user'),compact('movie'));
            }else{
               
                return view('welcome',compact('movie'));
            }
            
        }
        else{
            echo '<script>' ;
            echo 'alert("No such user ")';
            echo '</script>';
            return view('login');
        }
    }
}
