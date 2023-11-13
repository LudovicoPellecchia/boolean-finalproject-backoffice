<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\BraintreeController;
use App\Http\Controllers\PremiumUserController;

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
    return redirect('http://localhost:5174/');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    //CREATE
    Route::get('/user/create', [UserProfileController::class, 'create'])->name('user.create');
    Route::post('/user', [UserProfileController::class, 'store'])->name('user.store');
    //READ
    Route::get('/user', [UserProfileController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [UserProfileController::class, 'show'])->name('user.show');
    //UPDATE
    Route::get('/user/{user}/edit', [UserProfileController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserProfileController::class, 'update'])->name('user.update');
    //DELETE
    Route::delete('/user/{user}', [UserProfileController::class, 'destroy'])->name('user.destroy');
});

//Rotte Braintree
Route::get('/form', [BraintreeController::class, 'showForm'])->name('form.show');
Route::post('/form', [BraintreeController::class, 'submitForm'])->name('form.submit');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
