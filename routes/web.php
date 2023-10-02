<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class , 'index']);



Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');

Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');



Route::get('/listings/{listing}',[ListingController::class,'show']);

Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/users',[UserController::class,'store'])->middleware('guest');

Route::get('/logout',[UserController::class,'logout'])->middleware('auth');

Route::get('/login',[UserController::class,'login'])->middleware('guest');

Route::post('/users/login',[UserController::class,'userlogin'])->name('login')->middleware('guest');



// Route::get('/hello',function(){
//     return response('<h1>Hello World</h1>',200)
//     ->header('Content-type','text/plain')
//     ->header('foo','bar');
// });

// Route::get('/posts/{id}',function($id){
   
//     return response('Post' . $id);
// })->where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//    return $request->name.' '.$request->city;
   
// });