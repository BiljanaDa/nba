<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
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
    return view('pages.home');
});

Route::resource('/teams', 'App\Http\Controllers\TeamController');
Route::resource('/players', 'App\Http\Controllers\PlayerController');
Route::resource('/auth', 'App\Http\Controllers\AuthController');
Route::resource('comments', 'App\Http\Controllers\CommentsController');

Route::middleware('notauthenticated')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::get('/verify/{verify_string}', [AuthController::class, 'verify']);
});

Route::middleware('authenticated')->group(function() {
    Route::get('/logout', [AuthController::class, 'destroy']);
    Route::post('/editcomment', [CommentsController::class, 'update']);
});

Route::post('/createcomment', [CommentsController::class, 'store']);
Route::get('/deletecomment/{id}', [CommentsController::class, 'destroy']);

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

