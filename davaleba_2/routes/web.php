<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts', function (){
//    $posts = \Illuminate\Support\Facades\DB::table('posts')->get();
//    return $posts;
    return \App\Models\Post::all();
});

Route::get('/', function () {
    return view('welcome');
});
