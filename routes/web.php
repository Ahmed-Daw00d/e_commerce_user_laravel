<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\staticController;
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
})->name('home.index');

 Route::get('/about',[staticController::class,'about'])->name('home.about');
 Route::get('/contact',[staticController::class,'contact'])->name('home.contact');
