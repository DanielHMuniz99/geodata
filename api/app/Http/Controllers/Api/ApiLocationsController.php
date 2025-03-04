<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiLocationsService;
use Illuminate\Http\JsonResponse;

class ApiLocationsController extends Controller
{
    protected $apiLocationsService;

    public function __construct(ApiLocationsService $apiLocationsService)
    {
        $this->apiLocationsService = $apiLocationsService;
    }

    /**
     * @param int|null $id
     * 
     * @return JsonResponse
     */
    public function getDistritosById(?int $id = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistritosById($id);
        return response()->json($data);
    }

    /**
     * @param string|null $uf
     * 
     * @return JsonResponse
     */
    public function getDistritosByUf(?string $uf = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistritosByUf($uf);
        return response()->json($data);
    }

    /**
     * @param int|null $mesorregiao
     * 
     * @return JsonResponse
     */
    public function getDistritosByMesorregiao(?int $mesorregiao = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistritosByMesorregiao($mesorregiao);
        return response()->json($data);
    }

    /**
     * @param int|null $microrregiao
     * 
     * @return JsonResponse
     */
    public function getDistritosByMicrorregiao(?int $microrregiao = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistritosByMicrorregiao($microrregiao);
        return response()->json($data);
    }

    /**
     * @param int|null $municipio
     * 
     * @return JsonResponse
     */
    public function getDistritosByMunicipio(?int $municipio = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistritosByMunicipio($municipio);
        return response()->json($data);
    }
}