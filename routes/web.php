<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\EtudiantController;

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

Route::resource('produit', ProduitController::class);
Route::resource('livre', LivreController::class);
Route::resource('etudiant', EtudiantController::class);
Route::resource('cours', CoursController::class);
Route::resource('boutique', BoutiqueController::class);
Route::resource('contact', ContactController::class);


