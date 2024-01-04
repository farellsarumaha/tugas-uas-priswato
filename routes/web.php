<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Member\LoginController as MemberLoginController ;
use App\Http\Controllers\Member\PricingController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\MovieController as MemberMovieController;

Route::get('/', function () {
    echo "hallo guys";
});

/* Route::group(['prefix'=>'test'],function(){
Route::get('/hai', function(){
    echo "hai guys";
});
});
 */
/* Route::get('/hai/{id}',[TestController::class,'index']); */
/* Route::get('/admin/dasboard',[DashboardController::class,'index']); */
/* Route::get('templating1',[TestController::class,'bwa1']); */
/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

Route::get('test', function(){
return 'Hello';
})->middleware('admin');
// route  Register
Route::view('/','index');
Route::get('/register',[RegisterController::class,'index'])->name('member.register');
Route::post('/register',[RegisterController::class,'store'])->name('member.register.store');
//Login Member
Route::get('/Login',[MemberLoginController::class,'index'])->name('member.login');
Route::post('/Login',[MemberLoginController::class,'auth'])->name('member.login.auth');
// View pricing
Route::get('/pricing',[PricingController::class,'index'])->name('pricing');



 Route::group (['prefix'=>'member','middleware'=>['auth']],function(){
     Route::get('/',[MemberDashboardController::class, 'index'])->name('member.dashboard');
     route::get('movie/{id}', [MemberMovieController::class,'show'])->name('member.movie.detail');
     route::get('movie/{id}/watch', [MemberMovieController::class,'watch'])->name('member.movie.watch');

 });


// route admin Auth /login
Route::get('/admin/login',[LoginController::class,'index'])
->name('admin.login');
Route::post('/admin/login',[LoginController::class,'authenticate'])->name('admin.login.auth');

//route admin Auth -> dashboard
Route::group(['prefix'=>'admin','middleware'=>['admin.auth']]   ,function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/logout',[LoginController::class,'logout'])->name('admin.login.logout');
// Route Admin Crud
    Route::group(['prefix'=>'movie'],function(){
        Route::get('/',[MovieController::class,'index'])->name('admin.movie');
        Route::get('/create',[MovieController::class,'create'])->name('admin.movie.create');
        Route::post('/store',[MovieController::class,'store'])->name('admin.movie.store');
        Route::get('/edit{id}',[MovieController::class,'edit'])->name('admin.movie.edit');
        Route::put('/update/{id}',[MovieController::class,'update'])->name('admin.movie.update');
        Route::delete('destroy/{id}',[MovieController::class,'destroy'])->name('admin.movie.destroy');
    });
    Route::get('/transaction',[TransactionController::class,'index'])->name ('admin.transaction');
    // Route::resource('/film', MovieController::class);
});

require __DIR__.'/dokumen.php';
