<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

Route::get('/', [FormController::class, 'home']);
Route::get('/formpage/{id}', [FormController::class, 'formpage']);
Route::post('/createnewform/', [FormController::class, 'createnewform']);
Route::post('/submitnewfield/',[FormController::class, 'submitnewfield']);
Route::post('/deployform/',[FormController::class, 'deployform']);
Route::post('/archiveform/',[FormController::class, 'archiveform']);
