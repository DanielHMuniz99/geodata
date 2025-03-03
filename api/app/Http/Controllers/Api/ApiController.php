<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiCensusService;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function getNames(string $name, ApiCensusService $apiCensusService): JsonResponse
    {
        $data = $apiCensusService->getNames($name);
        return response()->json($data);
    }

    public function getNamesByRanking(ApiCensusService $apiCensusService): JsonResponse
    {
        $data = $apiCensusService->getNamesByRanking();
        return response()->json($data);
    }
}
