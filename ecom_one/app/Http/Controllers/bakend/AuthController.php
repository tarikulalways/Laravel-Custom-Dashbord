<?php

namespace App\Http\Controllers\bakend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // admin login form view
    public function login()
    {
        if(!Auth::check()){
            return view('bakend.pages.login');
        }else{
            return back();
        }
    }

    // user login form view
    public function userLogin(){
        if(!Auth::check()){
            return view('bakend.user.login');
        }else{
            return back();
        }

    }

    // user login system
    public function userloginPost(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user_crandisial = $request->only('email', 'password');
        if(Auth::attempt($user_crandisial)){
            if(Auth::user()->user_rol == 'user'){
                return redirect()->route('profile');
            }else{
                return view('bakend.user.login');
            }
        }else{
            session()->flash('error','Your Email or Password is wrong!');
            return back();
        }
    }

    // user profile page view
    public function profile()
    {
        if(Auth::check() && Auth::user()->user_rol == 'user'){
            return view('bakend.user.user');
        }else{
            return back();
        }

    }

    // user logout syttem
    public function userLogout(){
        Auth::logout();
        return redirect()->route('userLogin');
    }

    // user registration view
    public function registration()
    {
        if(!Auth::check()){
            return view('bakend.pages.registration');
        }else{
            return back();
        }
    }

    // admin dahsbord page view
    public function dahsbord()
    {
        if(Auth::check() && Auth::user()->user_rol == 'admin'){
            return view('bakend.pages.dashbord');
        }else{
            return back();
        }
    }

    // user registration successfull
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ]);

        $store = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('userLogin');
    }

    // admin login successfull
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $crandisial = $request->only('email', 'password');

        if (Auth::attempt($crandisial)) {
            if (Auth::user()->user_rol == 'admin') {
                return redirect()->route('dashbord');
            }else{
                return view('bakend.pages.login');
            }
        } else {
            session()->flash('error', 'Your Email or Password is wrong!');
            return back();

        }
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
