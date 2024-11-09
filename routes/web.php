<?php

use App\Http\Controllers\CreaPostController;

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts', function (){
    //Recupera tutti i Post
    $posts = Post::all();//
return view('posts.index', ['posts' => $posts]);
//$user = User::factory()->create();
//return $user;
})->name ('posts.index');

Route::get('/posts/create', [CreapostController::class,'creaPost'])->name('posts.create');

route::get('/home',function (){
    return view('home');
});


route::get('/about',function (){
    return view('about');
});
