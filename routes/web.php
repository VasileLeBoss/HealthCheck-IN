<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/accueil');
    } else {
        return view('login');
    }
});

Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/accueil');
    } else {
        return view('login');
    }
})->name('login');

Route::get('/inscription', function () {
    if (auth()->check()) {
        return  redirect('/accueil');
    } else {
        return view('register');
    }
})->name('inscription');



// Route::get('/login', function () { return view('welcome');})->name('login');

// Route::get('/inscription', function () {
//     return view('register');
// })->name('inscription');

Route::get('/accueil', function () {
    return view('accueil');
})->middleware('auth');


Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

// Afficher le formulaire de connexion
//Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');

// Gérer la soumission du formulaire de connexion
Route::post('/login', 'App\Http\Controllers\AuthController@login');

// Déconnexion de l'utilisateur
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
