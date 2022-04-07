<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // load view of dashboard
    public function getDashboard(){
        $posts=PostResource::collection(Post::all());
        return view('dashboard.index', ['posts'=>$posts]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if user login
        if (Auth::check()) {
            // check if user is admin
            if(auth()->user()->hasRole('admin'))
            {
                return redirect()->route('dashboard');
            }
            else{
                $id = Auth::user()->id;
                $posts = Post::where('user_id',$id)->get();
                
                return view('posts.index',compact('posts'));
                }
            }
        else{
            echo "unauthorized";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //load view to create post
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save post in db
        $id = Auth::id();
        $post= new Post();
        $post->title = $request->title;
        $post->body=$request->body;
        $post->user_id=$id;
        $post->save();
    
        return redirect()->route("posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show post details by id 
        $post=Post::find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // load view to edit post
        $post = Post::find($id);
        return view("posts.edit",$post);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update post
        $data = Post::find($id);
        $data->title=$request->title;
        $data->body=$request->body;
        $data->updated_at=$request->updated_at;
        $data->save();
        return redirect()->route('posts');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete post
        Post::destroy($id);
        return redirect()->route('posts');
    }
}   
