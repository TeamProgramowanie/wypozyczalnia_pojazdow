<?php

use App\Http\Controllers\PojazdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KlientController;
use App\Http\Controllers\WypozyczeniaController;
use App\Http\Controllers\OpcjeController;
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

Route::get('/', function () {
    return view('index');
})->name('index');


// Użytkownicy //
// SHOW: Formularz Rejestracji
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('user.register');
// STORE: Zapisanie nowego Użytkownika
Route::post('/users', [UserController::class, 'store'])->name('user.store');

// Wylogowanie
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('user.logout');

// SHOW: Formularz Logowanie
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
// AUTHENTICATE: Logowanie
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('user.authenticate');


// Pracownicy //
// SHOW: Lista pracowników
Route::get('/users/manage_show', [UserController::class, 'index'])->name('pracownicy.index');


Route::get('/users/manage', [UserController::class, 'manage'])->name('pracownicy.manage'); //->middleware('auth');
Route::post('/users/manage/add', [UserController::class, 'manage_store'])->name('pracownicy.add'); //->middleware('auth');

Route::get('/users/manage_edit/{user}', [UserController::class, 'edit'])->name('pracownicy.edit'); //->middleware('auth');
//Route::post('/users', [UserController::class, 'store_edit']);

Route::put('/users/{user}', [UserController::class, 'update'])->name('pracownicy.update');
Route::delete('/users/manage_show/{user}', [UserController::class, 'destroy'])->name('pracownicy.destroy'); //->middleware('auth');

// Klienci //
// SHOW: Lista Klienci
Route::get('/klient/client_show', [KlientController::class, 'index'])->name('klient.index');


Route::get('/klient/client', [KlientController::class, 'manage_client'])->name('klient.manage'); //->middleware('auth');
Route::post('/klient/client/add', [KlientController::class, 'manage_client_store'])->name('klient.add'); //->middleware('auth');

Route::get('/klient/client_edit/{user}', [KlientController::class, 'edit'])->name('klient.edit'); //->middleware('auth');
Route::post('/klient', [KlientController::class, 'store_client_edit']);

Route::put('/klient/{user}', [KlientController::class, 'update'])->name('klient.update');
Route::delete('/klient/client_show/{user}', [KlientController::class, 'destroy'])->name('klient.destroy'); //->middleware('auth');


// Pojazdy //
// SHOW: Wszystkie pojazdy
Route::get('/pojazdy', [PojazdController::class, 'index'])->name('pojazdy.index');

// SHOW: Formularz dodawania pojazdu
Route::get('/pojazdy/create', [PojazdController::class, 'create'])->name('pojazdy.create') ;//->middleware('auth');
// STORE: Zapisanie nowego pojazdu
Route::post('/pojazdy', [PojazdController::class, 'store'])->name('pojazdy.store');

// SHOW: Formularz edytowania pojazdu
Route::get('/pojazdy/{pojazd}/edit', [PojazdController::class, 'edit'])->name('pojazdy.edit'); //->middleware('auth');
// UPDATE: Aktualizacja pojazdu
Route::put('/pojazdy/{pojazd}', [PojazdController::class, 'update'])->name('pojazdy.update');

// DESTROY: Usunięcie pojazdu
Route::delete('/pojazdy/{pojazd}', [PojazdController::class, 'destroy'])->name('pojazdy.destroy'); //->middleware('auth');

// SHOW: Wyświetlenie wybranego pojazdu
Route::get('/pojazdy/{pojazd}', [PojazdController::class, 'show'])->name('pojazdy.show'); //->middleware('auth');


// Wypożyczenia //
// SHOW: Wszystkie wypożyczenia
Route::get('/wypozyczenia', [WypozyczeniaController::class, 'index'])->name('wypozyczenia.index');

// SHOW: Formularz dodawania wypożyczenia
Route::get('/wypozyczenia/create', [WypozyczeniaController::class, 'create'])->name('wypozyczenia.create') ;//->middleware('auth');
// STORE: Zapisanie nowego wypożyczenia
Route::post('/wypozyczenia', [WypozyczeniaController::class, 'store'])->name('wypozyczenia.store');

Route::get('wypozyczenia/generate', function (){
    return view('wypozyczenia.generate');
})->name('wypozyczenia.generate') ;

Route::post('wypozyczenia/report', [WypozyczeniaController::class, 'showReport']) ->name('wypozyczenia.report') ;


// lista dodatkowych opcji
Route::get('/opcje/dodatkowe_opcje', [OpcjeController::class, 'index'])->name('opcje.index');

// SHOW: Formularz edytowania wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}/edit', [WypozyczeniaController::class, 'edit']); //->middleware('auth');
// UPDATE: Aktualizacja wypożyczenia
//Route::put('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'update']);

// DESTROY: Usunięcie wypożyczenia
//Route::delete('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'destroy']); //->middleware('auth');

// SHOW: Wyświetlenie wybranego wypożyczenia
//Route::get('/wypozyczenia/{wypozyczenie}', [WypozyczeniaController::class, 'show']); //->middleware('auth');

