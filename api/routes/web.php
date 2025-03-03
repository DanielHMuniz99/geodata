<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiCensusController;

Route::prefix('census')->group(function () {
    Route::get('names/{name}', [ApiCensusController::class, 'getNames']);
    Route::get('ranking', [ApiCensusController::class, 'getNamesByRanking']);
});