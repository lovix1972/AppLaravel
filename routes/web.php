<?php

use App\Models\Capitolo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CapitoloController,
    DashboardController,
    GestfinController,
    GestioneRepartiController,
    PreavvisiController,
    RegisterController,
    ReglistController,
    RepartoController,
    ReportGUController,
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
    Route::get('/login', 'showReparti')->name('showReparto');
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
Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    Route::view('/insdati', 'pages.inspds_reparto')->name('insdati');
});

// 👥 Gestione utenti
Route::controller(UserController::class)->group(function () {
    Route::get('/utenti', 'userlist')->name('userlist');
    Route::get('/utenti/{id}', 'deleteUser')->name('deleteUser');
});

// 📑 CRUD PDS (protetto)
Route::middleware('auth')->group(function () {

    // Risorsa CRUD per i preavvisi (Capitoli)
    Route::resource('preavvisi', CapitoloController::class);

    // Gestione registrazioni PDS
    Route::resource('pds', RegisterController::class);
    Route::get('/reglist', [RegisterController::class, 'index'])->name('reglist.index');
    Route::get('/inspds', [RegisterController::class, 'show'])->name('inspds.show');
    Route::put('/inspds/{id}', [RegisterController::class, 'update'])->name('pdsUpdate');
    Route::post('/inspds', [RegisterController::class, 'store'])->name('InsertPds');
    Route::delete('/inspds/{id}', [RegisterController::class, 'destroy'])->name('DeletePds');
    Route::post('/pds/update-status/{pds}', [RegisterController::class, 'updateStatus'])->name('pds.update-status');

    // Gestione finanziaria e report
    Route::get('/gestione-finanziaria', [GestfinController::class, 'index'])->name('gestfin');
    Route::get('/gestione-finanziaria', [RegisterController::class, 'gestfin'])->name('gestfin'); // Potrebbe esserci conflitto? Verifica
    Route::get('/reportgu-reparto', [ReportGUController::class, 'reportReparto'])->name('report.reparto');

    // CRUD Gestione Reparti
    Route::get('/gestione-reparti', [GestioneRepartiController::class, 'index'])->name('gestione-reparti.index');
    Route::post('/gestione-reparti', [GestioneRepartiController::class, 'store'])->name('gestione-reparti.store');
    Route::put('/gestione-reparti/{department}', [GestioneRepartiController::class, 'update'])->name('gestione-reparti.update');
    Route::delete('/gestione-reparti/{department}', [GestioneRepartiController::class, 'destroy'])->name('gestione-reparti.destroy');

    // Dashboard (duplicata in statiche, valutarne la rimozione)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/reglist/print', [ReglistController::class, 'printPdf'])->name('reglist.print');

    Route::resource('preavvisi', PreavvisiController::class);
    Route::get('/preavvisi/{capitolo}', [PreavvisiController::class, 'show'])->name('preavvisi.show');





});

