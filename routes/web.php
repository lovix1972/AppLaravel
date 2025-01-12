<?php



use App\Http\Controllers\RegisterController;

use App\Http\Controllers\RepartoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use App\Http\Middleware\AddCustomHeader;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function (){
    return view('about');
});

Route::get('/home', function () {
    return view('pages.home');
})->Middleware('auth');
Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

Route::get('/register',[UserController::class,'showRegistrationForm'])->name('showUserForm');
Route::get('/register',[ RepartoController::class,'showRepartiFormRegister']);
Route::post('/register',[UserController::class,'register'])->name('registerUser');


Route::get('/utenti', [UserController::class,'userlist'])->name('userlist')
->Middleware('auth');

Route::get('/utenti/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
//Login
route::get('/login',[UserController::class,'showLoginForm'])->name('login');

route::post('/login',[UserController::class,'login'])->name('loginUser');
route::get('/login',[RepartoController::class,'showReparti'])->name('reparti');

route::get('/logout',[UserController::class,'logout'])->name('logoutUser');

Route::get('/reglist',[RegisterController::class,'reglist'])->name('reglist')->Middleware('auth');


Route::get('/inspds',[RegisterController::class,'ShowFormInspds'])->name('ShowFormPds')->Middleware('auth');
Route::post('/inspds',[RegisterController::class,'create'])->name('InsertPds')->Middleware('auth');
Route::get('/inspds/{id}/delete',[RegisterController::class,'destroy'])->name('DeletePds')->Middleware('auth');
Route::get('/inspds',[RegisterController::class,'getreparto'])->name('getreparto')->Middleware('auth');

Route::get('/insreparto', [RepartoController::class, 'ShowFormReparto'])->name('ShowFormReparto')->Middleware('auth');
Route::post('/insreparto',[RepartoController::class,'insertReparto'])->name('InsertReparto')->middleware('auth');
