<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Registration\PreRegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\ApplicationController;

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

Route::get('/pre-registration', [PreRegistrationController::class, 'index'])->name('pre-registration.index');
Route::post('/pre-registration', [PreRegistrationController::class, 'store'])->name('pre-registration.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/application', [ApplicationController::class, 'personal'])->middleware(['auth','verified'])->name('application.personal');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
