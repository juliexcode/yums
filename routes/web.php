<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarteController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;

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
    return view('welcome');
});
Route::get('/', ['App\Http\Controllers\Frontend\WelcomController', 'index'])->name('welcome.index');

Route::get('/lacarte', ['App\Http\Controllers\Frontend\CarteController', 'index'])->name('carte.index');
Route::get('/lacarte/plats', ['App\Http\Controllers\Frontend\CarteController', 'plat'])->name('carte.plat');
Route::get('/reservation/premier-partie', ['App\Http\Controllers\Frontend\ReservationController', 'premier'])->name('reservation.premier');
Route::post('/reservation/premier-partie', ['App\Http\Controllers\Frontend\ReservationController', 'storepremier'])->name('reservation.store.premier');
Route::get('/reservation/deuxieme-partie', ['App\Http\Controllers\Frontend\ReservationController', 'deuxieme'])->name('reservation.deuxieme');
Route::post('/reservation/deuxieme-partie', ['App\Http\Controllers\Frontend\ReservationController', 'storedeuxieme'])->name('reservation.store.deuxieme');
Route::get('/merci', ['App\Http\Controllers\Frontend\WelcomController', 'merci'])->name('merci');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/carte', CarteController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/resa', ReservationController::class);
});

require __DIR__ . '/auth.php';
