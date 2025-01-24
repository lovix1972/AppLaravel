<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RepartoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login
route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
route::post('/login', [UserController::class, 'login'])->name('loginUser');
route::get('/login', [RepartoController::class, 'showReparti'])->name('reparti');
route::get('/logout', [UserController::class, 'logout'])->name('logoutUser');

Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showUserForm');
Route::get('/register', [RepartoController::class, 'showRepartiFormRegister']);
Route::post('/register', [UserController::class, 'register'])->name('registerUser');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('pages.home');
    });

    Route::get('/utenti', [UserController::class, 'userlist'])->name('userlist');
    Route::get('/utenti/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::get('/reglist', [RegisterController::class, 'reglist'])->name('reglist');
    Route::get('/reglist/{id}', [RegisterController::class, 'show']);

    Route::get('/inspds', [RegisterController::class, 'ShowFormInspds'])->name('ShowFormPds');
    Route::post('/inspds', [RegisterController::class, 'create'])->name('InsertPds');
    Route::delete('/inspds/{id}', [RegisterController::class, 'delete'])->name('DeletePds');
    Route::get('/inspds', [RegisterController::class, 'getreparto'])->name('getreparto');
    Route::get('/modifica/{id}', [RegisterController::class, 'show'])->name('modifica.show');
    Route::put('/reglist{id}', [RegisterController::class, 'update'])->name('reglist.update');

    Route::get('/list', [RegisterController::class, 'index']);

    Route::post('/registrareparto', [RepartoController::class, 'store'])->name('StoreReparto');

});
