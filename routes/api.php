<?php

use App\Http\Controllers\DepoimentosController;
use App\Models\Depoimentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use JetBrains\PhpStorm\Deprecated;

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

Route::prefix('depoimentos')->group(function(){
    Route::get('/{id}', [DepoimentosController::class, 'show'])->name('show');
    Route::post('/create', [DepoimentosController::class, 'create'])->name('create');
    Route::put('/{id}', [DepoimentosController::class, 'edit'])->name('edit');
    Route::delete('/{id}', [DepoimentosController::class, 'destroy'])->name('destroy');
});

Route::get('/depoimentos-home', [DepoimentosController::class, 'show_3'])->name('depoimentos-home');
