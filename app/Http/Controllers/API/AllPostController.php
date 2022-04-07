<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AllPostController extends Controller
{
    //
    public function getUserPost(){
        // check if user login
        if (Auth::check()) {
           // check if user is admin
            if(auth()->user()->hasRole('admin'))
            {
            $posts=Post::all();
            return $posts;
            }
            else{
                $id = Auth::user()->id;
                $posts = Post::where('user_id',$id)->get();
                
                return $posts;
                }
            }
        else{
            echo "unauthorized";
       }
   }
}
