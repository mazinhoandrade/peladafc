<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\BabaController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//
// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/atleta', [HomeController::class, 'lista'])->name('atleta');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'indexA']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::get('/',[AdminController::class, 'index'])->name('admin.home');

    Route::resource('/atleta', AtletaController::class);
    Route::resource('/baba', BabaController::class);
    Route::post('/baba/create', [BabaController::class, 'storeli'])->name('baba.storeli'); 
});    

Route::fallback(function(){
    echo "erro 404";
});



