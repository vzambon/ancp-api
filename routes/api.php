<?php

use App\Http\Controllers\ConsultaPublicaController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::prefix('consulta-publica')
    ->controller(ConsultaPublicaController::class)
    ->group(function () {
        Route::get('', 'index')->middleware('throttle:20,1');
        Route::get('search-gado-by', 'listGadoBy')->middleware('throttle:200,1');
        Route::get('{consultaPublica}', 'show')->middleware('throttle:20,1');
        Route::get('select/{select}', 'listSelect');
    });
