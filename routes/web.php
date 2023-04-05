<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;

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

Route::get('/', function () {return view('welcome');});


/*
|--------------------------------------------------------------------------
| ROUTES ÉTUDIANTS
|--------------------------------------------------------------------------
*/
Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('etudiant-edit/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
Route::get('query', [EtudiantController::class, 'query']);
Route::get('etudiant-page', [EtudiantController::class, 'page'])->name('etudiant.page');

/*
|--------------------------------------------------------------------------
| ROUTES REGISTRATION
|--------------------------------------------------------------------------
*/
Route::get('registration', [CustomAuthController::class, 'create'])->name('user.registration');
Route::post('registration', [CustomAuthController::class, 'store']);

/*
|--------------------------------------------------------------------------
| ROUTES USERS
|--------------------------------------------------------------------------
*/
Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');

/*
|--------------------------------------------------------------------------
| ROUTES LOGIN
|--------------------------------------------------------------------------
*/
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentification']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTES LANGUES
|--------------------------------------------------------------------------
*/
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

/*
|--------------------------------------------------------------------------
| ROUTES PASSWORDS
|--------------------------------------------------------------------------
*/
Route::get('forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('forgot-password', [CustomAuthController::class, 'tempPassword']);
Route::get('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.password');
Route::post('new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword']);

/*
|--------------------------------------------------------------------------
| ROUTES ARTICLES
|--------------------------------------------------------------------------
*/
Route::get('articles', [ArticleController::class, 'index'])->name("article.index")->middleware('auth');
Route::get('articles/create', [ArticleController::class, 'create'])->name("article.create")->middleware('auth');
Route::post('articles/create', [ArticleController::class, 'store'])->name("article.store")->middleware('auth');
Route::get('articles/edit/{article}', [ArticleController::class, 'edit'])->name("article.edit")->middleware('auth');
Route::put('articles/edit/{article}', [ArticleController::class, 'update'])->name("article.update")->middleware('auth');
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name("article.destroy")->middleware('auth');
Route::get('articles-page', [ArticleController::class, 'page'])->name('article.page');

/*
|--------------------------------------------------------------------------
| ROUTES DOCUMENTS
|--------------------------------------------------------------------------
*/
Route::get('documents', [DocumentController::class, 'index'])->name("document.index")->middleware('auth');
Route::get('documents/create', [DocumentController::class, 'create'])->name("document.create")->middleware('auth');
Route::post('documents/create', [DocumentController::class, 'store'])->name("document.store")->middleware('auth');
Route::get('documents/edit/{document}', [DocumentController::class, 'edit'])->name("document.edit")->middleware('auth');
Route::put('documents/edit/{document}', [DocumentController::class, 'update'])->name("document.update")->middleware('auth');
Route::get('documents/download/{document}', [DocumentController::class, 'download'])->name("document.download")->middleware('auth');
Route::delete('documents/{document}', [DocumentController::class, 'destroy'])->name("document.destroy")->middleware('auth');


