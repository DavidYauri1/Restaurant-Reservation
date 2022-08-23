<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontnd\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontnd\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontnd\ReservationController as FrontndReservationController;

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

Route::get('/cagories',[FrontendCategoryController::class,'index'])->name('categories.index');
Route::get('/cagories/{category}',[FrontendCategoryController::class,'show'])->name('categories.show');
Route::get('/menus',[FrontendMenuController::class,'index'])->name('menus.index');
Route::get('/reservation/step-one',[FrontndReservationController::class,'stepOne'])->name('reservation.step.one');
Route::get('/reservation/step-two',[FrontndReservationController::class,'stepTwo'])->name('reservation.step.two');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('menus',MenuController::class);
    Route::resource('tables', TableController::class);
    Route::resource('reservations',ReservationController::class);
});