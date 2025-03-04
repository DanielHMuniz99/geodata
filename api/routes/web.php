<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCensusController;
use App\Http\Controllers\Api\ApiLocationsController;

Route::prefix('census')->group(function () {
    Route::get('names/{name}', [ApiCensusController::class, 'getNames']);
    Route::get('ranking', [ApiCensusController::class, 'getNamesByRanking']);
});

Route::prefix('localidades')->group(function () {
    Route::get('/distritos/{id?}', [ApiLocationsController::class, 'getDistritosById']);
    Route::get('/estados/{uf?}/distritos', [ApiLocationsController::class, 'getDistritosByUf']);
    Route::get('/mesorregioes/{mesorregiao?}/distritos', [ApiLocationsController::class, 'getDistritosByMesorregiao']);
    Route::get('/microrregioes/{microrregiao?}/distritos', [ApiLocationsController::class, 'getDistritosByMicrorregiao']);
    Route::get('/municipios/{municipio?}/distritos', [ApiLocationsController::class, 'getDistritosByMunicipio']);
});