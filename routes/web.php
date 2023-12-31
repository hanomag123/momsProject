<?php

use App\Helper\Helper;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/setLocale/{locale}', [Helper::class, 'setLocale'])->name('setLocale');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article');

Route::get('/events', [ArticleController::class, 'vueIndex'])->name('events');

Route::post('/form-request', [FormController::class, 'index']);

Route::get('/map', function () {
  return view('map');
});

Route::get('/aboutus', [MainController::class, 'aboutus'])->name('oneWindow');


require __DIR__.'/auth.php';




