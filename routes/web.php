<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;


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
Route::get('/form', function () {
    return view('frontend.form');
});
Route::get('/', function () {
    return view('frontend.login');
});
Route::get('/feed', function () {
    return view('frontend.feedback');
});


// use App\Http\Controllers\LoginController;

Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('submit-feedback', [LoginController::class, 'submitFeedback'])->name('feedback');

Route::get('/web', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::get('/export-data' ,[UserController::class, 'exportdata'])->name('export');