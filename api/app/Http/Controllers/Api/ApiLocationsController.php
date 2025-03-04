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
    public function getDistrictsById(?int $id = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistrictsById($id);
        return response()->json($data);
    }

    /**
     * @param string|null $state
     * 
     * @return JsonResponse
     */
    public function getDistrictsByFederalUnit(?string $state = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistrictsByFederalUnit($state);
        return response()->json($data);
    }

    /**
     * @param int|null $mesoregion
     * 
     * @return JsonResponse
     */
    public function getDistrictsByMesoregion(?int $mesoregion = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistrictsByMesoregion($mesoregion);
        return response()->json($data);
    }

    /**
     * @param int|null $microregion
     * 
     * @return JsonResponse
     */
    public function getDistrictsByMicroregion(?int $microregion = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistrictsByMicroregion($microregion);
        return response()->json($data);
    }

    /**
     * @param int|null $municipality
     * 
     * @return JsonResponse
     */
    public function getDistrictsByMunicipality(?int $municipality = null): JsonResponse
    {
        $data = $this->apiLocationsService->getDistrictsByMunicipality($municipality);
        return response()->json($data);
    }
}