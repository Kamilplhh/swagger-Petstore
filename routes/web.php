<?php

use App\Http\Controllers\ApiController;
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
    return view('home');
});

Route::post('addPet', [ApiController::class, 'addPet'])->name('addPet'); 

Route::post('searchPetStatus', [ApiController::class, 'searchPetByStatus'])->name('searchPetStatus'); 

Route::post('searchPetID', [ApiController::class, 'searchPetByID'])->name('searchPetID'); 