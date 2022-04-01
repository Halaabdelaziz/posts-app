<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\addPostRequest;
use App\Http\Requests\addLoginRequest;

class AuthenticationController extends Controller
{
    public function create(){
        return view('register');
    }
    // create author, applying validations on user's atrributes
    public function createAccount(addPostRequest $request){

        $user = User::create([
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
            'phone'=>$request->phone
        ]);
        $user->attachRole('user');
        auth()->login($user);
        // create token user token 
        $token = $user->createToken('myToken')->plainTextToken;
        
        $response =[
            'user' =>$user,
            'token'=>$token
        ];

        return redirect()->route('create');
    }

    // sign in 
    public function createSigninView(){
        return view('login');
    }
    public function signin(addLoginRequest $request){  
        
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
              
                $request->session()->put('user_id',$user->id);
                return redirect()->route('posts');
            }else{
                return back()->with('fail','password doen not match');
            }
        }else{
            return back()->with('fail','this email is not registered');
        }
  
        return redirect("/login")->withSuccess('Login details are not valid');
    }

    // logout and destroy token
    public function signout(){
       
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        
        return redirect('/');
    }


}
