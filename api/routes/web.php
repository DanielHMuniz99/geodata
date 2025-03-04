<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCensusController;
use App\Http\Controllers\Api\ApiLocationsController;

Route::prefix('census')->group(function () {
    Route::get('names/{name}', [ApiCensusController::class, 'getNames']);
    Route::get('ranking', [ApiCensusController::class, 'getNamesByRanking']);
});

Route::prefix('locations')->group(function () {
    Route::get('/districts/{id?}', [ApiLocationsController::class, 'getDistrictsById']);
    Route::get('/states/{state?}/districts', [ApiLocationsController::class, 'getDistrictsByFederalUnit']);
    Route::get('/mesoregions/{mesoregion?}/districts', [ApiLocationsController::class, 'getDistrictsByMesoregion']);
    Route::get('/microregions/{microregion?}/districts', [ApiLocationsController::class, 'getDistrictsByMicroregion']);
    Route::get('/municipalities/{municipality?}/districts', [ApiLocationsController::class, 'getDistrictsByMunicipality']);
});