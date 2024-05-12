<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Registration\PreRegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Application\ApplicationController;
use App\Http\Controllers\Application\PersonalController;
use App\Http\Controllers\Application\ProfessionalController;
use App\Http\Controllers\Application\PassportController;
use App\Http\Controllers\Application\PaymentController;
use App\Http\Controllers\Application\PhotographController;
use App\Http\Controllers\Application\SignatureController;

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


Route::prefix('application')->middleware(['auth','verified'])->group(function(){
    Route::get('/', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/personal', [PersonalController::class, 'personal'])->name('application.personal');
    Route::get('/professional', [ProfessionalController::class, 'professional'])->name('application.professional');
    Route::get('/passport', [PassportController::class, 'passport'])->name('application.passport');
    Route::get('/payment', [PaymentController::class, 'payment'])->name('application.payment');
    Route::get('/photograph', [PhotographController::class, 'photograph'])->name('application.photograph');
    Route::get('/signature', [SignatureController::class, 'signature'])->name('application.signature');
});

//Route::get('/application', [ApplicationController::class, 'personal'])->middleware(['auth','verified'])->name('application.personal');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
