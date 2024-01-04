<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
   public  function index(){

    $relationship=[
        'package',
        'user'
    ];


    $transaction =Transaction::with($relationship)->get();

     return view('admin.transactions',['transactions'=>$transaction]);

   }
}
