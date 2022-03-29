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
    public function createAccount(Request $request){

        $attributes = $request->validate([
            'name'=>'required|string|min:3|max:200',
            'email'=>'required|unique:users,email|email|string',
            'password'=>'required|string|confirmed|min:6',
            'phone'=>'required|string|max:13'
        ]);
        $user=User::create([
            'name'=>$attributes['name'],
            'password'=>bcrypt($attributes['email']),
            'email'=>$attributes['email'],
            'phone'=>$attributes['phone']
        ]);
        $user->attachRole('user');
        // create token user token 
        $token = $user->createToken('myToken')->plainTextToken;
        $response =[
            'user' =>$user,
            'token'=>$token
        ];
        // return response($response, 201);
        return redirect()->route('/posts');
    }
    // sign in 
    public function createSigninView(){
        return view('login');
    }
    public function signin(Request $request){
        $credentials = $request->validate([
            'name'=>'required|string|min:3|max:200',
            'email'=>'required|unique:users,email|email|string'
        ]);
        if(!Auth::attempt($credentials)){
            return $this->error('credentials not match' , 401);
        }
        $response = [
            'author'=>Auth::User(),
            'token'=>auth()->user()->createToken('autherToken')->plainTextToken
        ];
        return redirect()->route('/posts');
       
    }
    // logout and destroy token
    public function signout(){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'signed out'
        ];
    }

}
