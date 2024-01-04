<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){

        return view('admin.auth');
    }

    public function authenticate(Request $request){
    $request->validate([
        'email'=>'required|email',
        'password'=>'required'

    ]);

    $credentials =$request->only('email','password');
    $credentials['roles_id']= 2 ;


    if (Auth::attempt($credentials)){

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    /* dd($credentials); */
    }

    return back()->withErrors([
        'email' => 'Your credentials are wrong',
    ])->withInput();

}

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('admin.login');

    }
}
