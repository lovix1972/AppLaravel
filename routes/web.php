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

Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

Route::get('/register',[UserController::class,'showRegistrationForm'])->name('showRegistrationForm');

Route::post('/register',[UserController::class,'register'])->name('registerUser');
