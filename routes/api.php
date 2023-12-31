<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SpecializationController;
use App\Http\Controllers\PremiumUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//rotta api che ritorna il json con i dati recuperati
Route::get("users", [ProfileController::class, "index"]);

//rotta api che ritorna il json con i dati di un singolo
Route::get("profile/{id}", [ProfileController::class, "show"]);
Route::get("profile", [ProfileController::class, "index"]);


Route::get("specialization", [SpecializationController::class, "index"]);


// rotta api che ritorna gli utenti che hanno una determinata categoria
Route::get('users/specialization/{id?}', [ProfileController::class, "filterUsersBySpecialization"]);


//rotta api che invia al database i messaggi dal frontend
Route::post("messages", [MessageController::class, "store"]);

// rotta api per le recensioni
Route::post('reviews', [ReviewController::class, 'createReview']);

//Rotta per recuperare l'utente con valore premium true
Route::get('/premium-users', [PremiumUserController::class, 'getPremiumUsers']);
