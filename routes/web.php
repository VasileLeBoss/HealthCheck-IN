<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicamentsController;
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

Route::get('/creation-rapport', [RapportController::class, 'create'])->middleware('auth')->name('creation-rapport');

Route::post('/creation-rapport', 'App\Http\Controllers\RapportController@store')->middleware('auth')->name('new-rapport');


Route::get('/accueil', [HomeController::class, 'index'])->middleware('auth')->name('accueil');

Route::get('/medicaments', [MedicamentsController::class, 'view'])->middleware('auth')->name('medicaments');


Route::get('/mon-compte', function () {
    return view('mon-compte');
})->middleware('auth')->name('mon-compte');

Route::get('/rapport-modif', [RapportController::class, 'view'])->middleware('auth')->name('rapport-modif');

Route::put('/rapport/{id}', [RapportController::class, 'update'])->middleware('auth')->name('update-rapport');

Route::delete('/rapport/{id}', [RapportController::class, 'destroy'])->name('delete-rapport');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

// Afficher le formulaire de connexion
//Route::get('/login', 'App\Http\Controllers\AuthController@showLoginForm')->name('login');

// Gérer la soumission du formulaire de connexion
Route::post('/login', 'App\Http\Controllers\AuthController@login');

// Déconnexion de l'utilisateur
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::post('/profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

Route::post('/profile/update-password', 'App\Http\Controllers\ProfileController@updatePassword')->name('profile.update.mdp');

Route::get('/compte/{id}', [ProfileController::class, 'destroy'])->name('desactiver-compte');

