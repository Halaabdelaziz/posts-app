<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function create(){
        return view('register');
    }
    // create author, applying validations on user's atrributes
    public function createAccount(addPostRequest $request){

        $user = User::create([
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        $user->attachRole('user');
        // create token user token 
        $token = $user->createToken('myToken')->plainTextToken;
        
        $response =[
            'user' =>$user,
            'token'=>$token
        ];

        return redirect()->route('create')->with('message', 'Successfully created!');
    }



    // sign in 
    public function createSigninView(){
        return view('login');
    }
    public function signin(Request $request){
        // $credentials = $request->validate([
        //     'email'=>'required|unique:users,email|email|string',
        //     'password'=>'required|string|min:3|max:200'
        // ]);
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        
        // if(!Auth::attempt($credentials)){
        //     return $this->error('credentials not match' , 401);
        // }   
        $user = User::where('email', $credentials['email'])->first();
        // dd( $user);
        // || !Hash::check($credentials['password'], $user->password)
        if(!$user ){
            return "WRONG";
        }
        $token = $user->createToken('myToken')->plainTextToken;
        

        
        $response = [
            'author'=>Auth::User(),
            'token'=>$token
        ];
        // return view('posts.index');
        return redirect()->route('posts');
       
       
    }
    // logout and destroy token
    public function signout(){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'signed out'
        ];
    }

}
