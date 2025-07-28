<?php


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RepartoController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

// Login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');
Route::get('/login', [RepartoController::class, 'showReparti'])->name('reparti');

Route::get('/inspds', [SelectController::class, 'showReparti'])->name('getdata');



route::get('/logout', [UserController::class, 'logout'])->name('logoutUser');

Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showUserForm');
Route::get('/register', [RepartoController::class, 'showRepartiFormRegister']);
Route::post('/register', [UserController::class, 'register'])->name('registerUser');


        Route::get('/home', function () {
        return view('pages.home');
        });

        Route::group(['middleware' => 'auth'], function () {


        Route::get('/reglist', [RegisterController::class, 'index'])->name('reglist');
        Route::get('/reglist/{id}', [RegisterController::class, 'show']);

        Route::get('/modifica/{id}', [RegisterController::class, 'show'])->name('modifica.show');
        Route::put('/reglist{id}', [RegisterController::class, 'update'])->name('reglist.update');
        Route::get('/list', [RegisterController::class, 'index'])->name('list');

});
        Route::get('/utenti', [UserController::class, 'userlist'])->name('userlist');
        Route::get('/utenti/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');



        Route::post('/inspds', [RegisterController::class, 'store'])->name('InsertPds');
        Route::delete('/inspds/{id}', [RegisterController::class, 'destroy'])->name('DeletePds');



        Route::post('/registrareparto', [RepartoController::class, 'store'])->name('StoreReparto');

        Route::get('/dashboard', function () {
        return view('pages.dashboard');
        });
        Route::get('/insdati', function () {
        return view('pages.inspds_reparto');
        });
Route::get('/pds/create', [SelectController::class, 'showReparti'])->name('pds.create');

Route::get('/get-capitoli-by-reparto', [SelectController::class, 'getCapitoliByReparto'])->name('get.capitoli.by.reparto');




