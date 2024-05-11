<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContatoController::class, 'index'])->name('listagem');
Route::get('/nova-campanha', [ContatoController::class, 'create'])->name('nova-campanha');
Route::post('/salvar-campanha', [ContatoController::class, 'store'])->name('salvar-campanha');
// Route::post('/salvar-campanha2', [ContatoController::class, 'store2'])->name('salvar-campanha');
