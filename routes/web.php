<?php

use App\Http\Controllers\HomeController;
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
 
Route::get('/', [HomeController::class,'get_home']);
Route::get('/background_remove', [HomeController::class,'get_background_remove']);
Route::post('/background_remove', [HomeController::class,'post_background_remove'])->name('post_background_remove');
Route::get('/cleanup', [HomeController::class,'get_cleanup']);
Route::post('/cleanup', [HomeController::class,'post_cleanup'])->name('post_cleanup');
 

// Route::post('/', [TutorialController::class,'store'])->name('store');
