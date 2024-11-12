<?php

use App\Http\Controllers\CreaPostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function (){
    return view('about');
});

Route::get('/home', function () {
    return view('home');
});
Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

Route::get('/register',[UserController::class,'showRegistrationForm'])->name('showRegisterForm');
Route::post('/register',[UserController::class,'register'])->name('registerUser');

Route::get('/utenti', function () {
    $users = User::all();
    return view('userlist',['users'=>$users]);
});

Route::get('/utenti/{id}',[UserController::class,'deleteUser'])->name('deleteUser');

route::get('/login',[UserController::class,'showLoginForm'])->name('showLoginForm');
