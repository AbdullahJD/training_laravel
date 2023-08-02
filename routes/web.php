<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\ItemController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboards', function () {
    return view('Dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //################################ dashboard category ########################################

    Route::resource('category',CategoryController::class);

    //################################ dashboard category ########################################

    //################################ dashboard item ########################################

    Route::resource('item',ItemController::class);

    //################################ dashboard item ########################################

    //################################ dashboard Store ########################################
    Route::resource('store',StoreController::class);
    //################################ dashboard Store ########################################

    //################################ dashboard Employee ########################################
    Route::resource('Employee',EmployeeController::class);
    //################################ dashboard Employee ########################################
    Route::get('/get-cities/{countryId}', [CountryController::class, 'getCities']);
});

require __DIR__.'/auth.php';
