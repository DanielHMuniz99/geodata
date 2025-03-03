<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::prefix('census')->group(function () {
    Route::get('names/{name}', [ApiController::class, 'getNames']);
    Route::get('ranking', [ApiController::class, 'getNamesByRanking']);
});