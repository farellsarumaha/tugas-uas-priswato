<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserPremium;

class MovieController extends Controller
{
public function show($id){
return view('member.movie-detail');
}

public function watch($id){

    $userId = auth()->user()->id;
    $userPremium ['roles_id']= 3;
    $userPremium= UserPremium::where('user_id',$userId)->first();
    if ($userPremium){

        return view('member.movie-watching');
    }
    return redirect()->route('pricing');



}
}
