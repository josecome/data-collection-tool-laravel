<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
Route::middleware(['auth', 'can:Enabled'])->group(function () {
   Route::get('/', [FormController::class, 'home']);
   Route::get('/formpage/{id}', [FormController::class, 'formpage']);
   Route::post('/createnewform/', [FormController::class, 'createnewform']);
   Route::post('/submitnewfield/', [FormController::class, 'submitnewfield']);
   Route::post('/deployform/', [FormController::class, 'deployform']);
   Route::post('/archiveform/', [FormController::class, 'archiveform']);
});

Route::get('/deployed/{id}', [FormController::class, 'deployedFormOnlineGet']);
Route::post('/deployedpost/{id}', [FormController::class, 'deployedFormOnlinePost']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
