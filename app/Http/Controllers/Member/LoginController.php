<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class LoginController extends Controller
{
  public function index(){

    return view('member.auth');
  }

  public function auth (Request $request ){

  $request->validate ([
    'email'=> 'required|email',
    'password'=>'required'

  ]);
  $credentials = $request->only('email','password');
  $credentials['roles_id']= 1 ;

   if (Auth::attempt($credentials)){
    $request->session()->regenerate();


        return redirect()->route('member.dashboard');

}
 return back()->withErrors([

    'credentials'=>'Sandi yang kamu masukkan salah'
 ])->withInput();

}
}
