<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use \App\Http\Controllers\SceneController;
use \App\Http\Controllers\ProfilController;
use App\Http\Controllers\ContactController;

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
    return view('accueil');
})->name('accueil');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');


Route::get('/apropos', function () {
    return view('apropos');
})->name('apropos');

Route::resource('/scenes', SceneController::class);
Route::post('/scenes/favoris/{scene}', [SceneController::class, 'toggleFavori'])->name('scenes.favoris');


//Route::resource('/commentaires', CommentaireController::class);

Route::get('/commentaires/{scene_id}/create', [CommentaireController::class,'create'])->name('commentaires.create');
Route::post('/commentaires/{scene_id}/store', [CommentaireController::class,'store'])->name('commentaires.store');
Route::delete('/commentaires/{commentaire}/{scene_id}/delete', [CommentaireController::class,'destroy'])->name('commentaires.delete');
Route::get('/commentaires/{commentaire_id}/{scene_id}/edit', [CommentaireController::class,'edit'])->name('commentaires.edit');
Route::put('/commentaires/{commentaire_id}/{scene_id}/update', [CommentaireController::class,'update'])->name('commentaires.update');



Route::get('/profil', [ProfilController::class, 'show'])->middleware(['auth'])->name('profil');
Route::post('/profil/edit', [ProfilController::class, 'updateAvatar'])->middleware(['auth'])->name('edit');

Route::post('/scenes/{scene}/notes', [NoteController::class, 'storeOrUpdate'])->name('notes.storeOrUpdate');
