<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadImageController;

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
    return view('Welcome');
});
Route::view('/', 'auth.login');
Route::get('upload-image', [UploadImageController::class, 'index']);
Route::get('main', [UploadImageController::class, 'main'])->name('main');
Route::get('table', [App\Http\Controllers\TableController::class, 'table'])->name('top');
//Route::get('delete', [UploadImageController::class, 'main'])->name('main');
Route::post('save', [UploadImageController::class, 'save']);
Route::post('/like', [App\Http\Controllers\likeController::class, 'like'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::view('/main', 'main')->name('main');
