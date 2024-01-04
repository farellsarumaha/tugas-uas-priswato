<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
     public function index(){

    return view ('member.register');

    }

    public function store(Request $request ){

    $request->validate([
        'name'=>'required',
        'phone_number'=>'required',
        'email'=>'required|email',
        'password'=>'required|min:6'
    ]);

$data = $request->except('_token');
$credentials =$request->only('email','password');
$credentials['role']='member';



    $isEmailExist = User::where('email',$request->email)->exists(); //return data true dan false

    if ($isEmailExist){
        return back()->withErrors([
        'email'=> 'Email ini sudah ada'
        ])

         ->withInput();
    }
    $data ['password'] = Hash::make($request->password);
    $data['role']= 'member';

    User::create($data);

    return redirect()->route('member.login');

    }
}
