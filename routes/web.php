<?php
namespace App\Http\Controllers;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('layouts/admin1');
});

// Route::get('candidats/edit-delete/{id}',[CandidatController::class],'destroy')->name('candidats.delete');
// Route::get('programmes/show',[ProgrammeController::class],'show')->name('programmes.show');
// Route::get('secteurs/show',[SecteurController::class],'show')->name('secteurs.show');

//Configuration de toutes les routes
Route::resource('candidats', CandidatController::class);
Route::resource('programmes', ProgrammeController::class);
Route::resource('secteurs', SecteurController::class);
Route::resource('electeurs', ElecteurController::class);

Route::get('/data/candidats', [CandidatController::class,'getData'])->name('candidats.data');