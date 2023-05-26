<?php

use App\Http\Controllers\ParkirController;
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

Route::get('/', [ParkirController::class, 'index']);
Route::post('proses', [ParkirController::class, 'proses']);
Route::delete('hapus/{id}', [ParkirController::class, 'hapus']);
Route::get('edit/{id}', [ParkirController::class, 'edit']);
Route::put('update/{id}', [ParkirController::class, 'Update']);