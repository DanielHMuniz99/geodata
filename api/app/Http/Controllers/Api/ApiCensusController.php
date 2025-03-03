<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiCensusService;
use Illuminate\Http\JsonResponse;

class ApiCensusController extends Controller
{
    protected $apiCensus;

    public function __construct(ApiCensusService $apiCensusService)
    {
        $this->apiCensusService = $apiCensusService;
    }

    /**
     * @param string name
     * 
     * @return JsonResponse
     */
    public function getNames(string $name): JsonResponse
    {
        $data = $this->apiCensusService->getNames($name);
        return response()->json($data);
    }

    /**
     * @return JsonResponse
     */
    public function getNamesByRanking(): JsonResponse
    {
        $data = $this->apiCensusService->getNamesByRanking();
        return response()->json($data);
    }
}
