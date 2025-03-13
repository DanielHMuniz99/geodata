<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCensusController;
use App\Http\Controllers\Api\ApiLocationsController;
use App\Http\Controllers\Api\ApiCountryGdpController;
use App\Http\Controllers\Api\ApiIncomeDistributionsController;
use App\Http\Controllers\Api\ApiCountriesController;

Route::prefix('census')->group(function () {
    Route::get('names/{name}', [ApiCensusController::class, 'getNames']);
    Route::get('ranking', [ApiCensusController::class, 'getNamesByRanking']);
});

Route::prefix('locations')->group(function () {
    Route::get('/districts/{id?}', [ApiLocationsController::class, 'getDistrictsById']);
    Route::get('/states', [ApiLocationsController::class, 'getStates']);
    Route::get('/states/{state?}/districts', [ApiLocationsController::class, 'getDistrictsByFederalUnit']);
    Route::get('/mesoregions/{mesoregion?}/districts', [ApiLocationsController::class, 'getDistrictsByMesoregion']);
    Route::get('/microregions/{microregion?}/districts', [ApiLocationsController::class, 'getDistrictsByMicroregion']);
    Route::get('/municipalities/{municipality?}/districts', [ApiLocationsController::class, 'getDistrictsByMunicipality']);
});

Route::prefix('gdp')->group(function () {
    Route::get('/', [ApiCountryGdpController::class, 'index']);
    Route::get('/{country_code}/{year}', [ApiCountryGdpController::class, 'show']);
});

Route::prefix('income')->group(function () {
    Route::get('/compare-income', [ApiIncomeDistributionsController::class, 'compareIncome']);
});

Route::prefix('countries')->group(function () {
    Route::get('/', [ApiCountriesController::class, 'getAll']);
});