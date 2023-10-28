<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\UserController;
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
//Route::get('/', function (){
//    return redirect('/wedstrijd');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');
//matches
//Route::post('/status-wijzigen/{id}', MatchController::class, 'update')->name('status.update');

Route::get('/wedstrijd', [MatchController::class, 'index'])->name('match.index')->middleware('admin');
Route::post('/wedstrijd/toggle-status/{match}', [MatchController::class, 'toggleStatus'])->name('matches.toggle-status');


Route::middleware(['auth'])->group(function () {

    Route::get('/wedstrijd/filter', [MatchController::class, 'searchandfilter']);

    Route::get('/wedstrijd/create', [MatchController::class, 'create'])->middleware('bekijk-minimaal-5-wedstrijden');

    route::post('/wedstrijd', [MatchController::class, 'store']);
    route::get('/wedstrijd/edit/{match}', [MatchController::class, 'edit']);
    route::put('/wedstrijd/{match}', [MatchController::class, 'update']);

    route::get('/wedstrijd/{match}', [MatchController::class, 'show']);
    route::post('/wedstrijd/{match}', [MatchController::class, 'show'])->name('wedstrijden.bekeken');

    route::get('/wedstrijd/{match}/delete', [MatchController::class, 'warning']);
    route::delete('/wedstrijd/{match}/delete', [MatchController::class, 'destroy']);
});
//user
Route::middleware(['auth-1'])->group(function () {

    route::get('/profile/{user}', [UserController::class, 'show'])->name('profile');
    route::get('/wedstrijd/{user}/overview', [UserController::class, 'index'])->name('mymatches');
    route::get('/profile/{user}/edit', [UserController::class, 'edit']);
    route::put('/profile/{user}', [UserController::class, 'update']);
});
Auth::routes([

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

