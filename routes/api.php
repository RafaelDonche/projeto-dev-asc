<?php

use App\Http\Resources\ContatoCollection;
use App\Http\Resources\ContatoResource;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/obterContatos', function () {
    return new ContatoCollection(Contato::all());
});

Route::get('/obterContatos/{campanha}', function ($campanha) {
    return new ContatoCollection(Contato::where('campanha', $campanha)->get());
});
