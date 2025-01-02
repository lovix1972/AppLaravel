<?php

use App\Http\Controllers\PdsRegisters;
use App\Http\Controllers\PostController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use App\Http\Middleware\AddCustomHeader;
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
})->Middleware('auth');
Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

Route::get('/register',[UserController::class,'showRegistrationForm'])->name('showRegisterForm');
Route::post('/register',[UserController::class,'register'])->name('registerUser');

Route::get('/utenti', [UserController::class,'userlist'])->name('userlist')
->Middleware('auth');

Route::get('/utenti/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
//Login
route::get('/login',[UserController::class,'showLoginForm'])->name('login');
route::post('/login',[UserController::class,'login'])->name('loginUser');

//Logout
route::get('/logout',[UserController::class,'logout'])->name('logoutUser');
Route::get('/inpds',[PdsRegisters::class,'pdsRegister'])->name('pdsRegister');
