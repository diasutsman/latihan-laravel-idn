<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('class', MyClassController::class);
Route::delete('/class', [MyClassController::class, 'deleteAll'])->name('class.deleteAll');
Route::resource('students', StudentController::class)->middleware(['auth']);
Route::delete('/students', [StudentController::class, 'destroyAll'])
  ->middleware(['password.confirm'])
  ->name('students.destroyAll');

Route::resource('categories', CategoryController::class)->middleware(['auth']);
Route::resource('books', BookController::class)->middleware(['auth']);
