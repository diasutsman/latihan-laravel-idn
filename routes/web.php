<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyClassController;
use App\Http\Controllers\StudentController;

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
Route::resource('students', StudentController::class);
Route::delete('/students', [StudentController::class, 'deleteAll'])
->middleware(['password.confirm'])
->name('students.deleteAll');

// Password Confirmation
Route::get('/confirm-password', function () {
  return view('auth.passwords.confirm');
})->middleware('auth')->name('password.confirm');
Route::post('/confirm-password', function (Request $request) {
  if (!Hash::check($request->password, $request->user()->password)) {
    return back()->withErrors([
      'password' => ['The provided password does not match our records.']
    ]);
  }

  // dd([$request->session()->all(), $request->method()]);

  $request->session()->passwordConfirmed();

  return redirect()->action([StudentController::class, 'deleteAll']);
})->middleware(['auth', 'throttle:6,1']);
