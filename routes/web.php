<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    GestfinController,
    RegisterController,
    RepartoController,
    SelectController,
    UserController,
    ValidationController};

// 🌐 Pagina iniziale
Route::view('/', 'pages.home')->name('home');

// 🔐 Autenticazione
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('loginUser');
    Route::get('/logout', 'logout')->name('logoutUser');
    Route::get('/register', 'showRegistrationForm')->name('showUserForm');
    Route::post('/register', 'register')->name('registerUser');
});

// 🧾 Reparto e selezioni (supporto alla registrazione)
Route::controller(RepartoController::class)->group(function () {
    Route::get('/login','showReparti')->name('showReparto');
    Route::get('/register', 'showRepartiFormRegister')->name('showRepartiForm');
    Route::post('/registrareparto', 'store')->name('StoreReparto');
});

Route::controller(SelectController::class)->group(function () {
    Route::get('/inspds', 'showReparti')->name('getdata');
    Route::get('/pds/create', 'showReparti')->name('pds.create');
    Route::get('/get-capitoli-by-reparto', 'getCapitoliByReparto')->name('get.capitoli.by.reparto');
});

// ✅ Validazione form
Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

// 📊 Pagine statiche protette
Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    Route::view('/insdati', 'pages.inspds_reparto')->name('insdati');
});

// 👥 Gestione utenti
Route::controller(UserController::class)->group(function () {
    Route::get('/utenti', 'userlist')->name('userlist');
    Route::get('/utenti/{id}', 'deleteUser')->name('deleteUser');
});

// 📑 CRUD PDS (protetto)
Route::middleware(['auth'])->group(function () {
    Route::resource('pds', RegisterController::class);
    Route::get('/reglist', [RegisterController::class, 'index'])->name('reglist.index');

    Route::get('/inspds', [RegisterController::class, 'show'])->name('inspds.show');

    Route::put('/inspds/{id}', [RegisterController::class, 'update'])->name('pdsUpdate');
    Route::get('/list', [RegisterController::class, 'index'])->name('list');
    Route::post('/inspds', [RegisterController::class, 'store'])->name('InsertPds');
    Route::delete('/inspds/{id}', [RegisterController::class, 'destroy'])->name('DeletePds');
    Route::get('/gestione-finanziaria', [GestfinController::class, 'index'])->name('gestfin');
    Route::post('/pds/update-status/{pds}', [RegisterController::class, 'updateStatus'])->name('pds.update-status');
    Route::get('/gestione-finanziaria', [RegisterController::class, 'gestfin'])->name('gestfin');


});

