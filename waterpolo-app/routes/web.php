<?php

use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/welcome', function () {
    return view('welcome');
});
//matches
Route::get('/wedstrijd', [MatchController::class, 'index']);

Route::get('/wedstrijd/create', [MatchController::class, 'create'])->middleware('auth');
route::post('/wedstrijd', [MatchController::class, 'store'])->middleware('auth');
route::get('/wedstrijd/edit/{match}', [MatchController::class, 'edit'])->middleware('auth');
route::put('/wedstrijd/{match}', [MatchController::class, 'update'])->middleware('auth');
route::get('/wedstrijd/{match}', [MatchController::class, 'show']);
route::get('/wedstrijd/{match}/delete', [MatchController::class, 'warning'])->middleware('auth');
route::delete('/wedstrijd/{match}/delete', [MatchController::class, 'destroy'])->middleware('auth');



Auth::routes([

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

