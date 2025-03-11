<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\CountryGdp;
use App\Services\ApiCountryGdpService;

class ApiCountryGdpController extends Controller
{
    protected $countryGdpService;

    public function __construct(ApiCountryGdpService $countryGdpService)
    {
        $this->countryGdpService = $countryGdpService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->countryGdpService->getAll());
    }

    /**
     * @param string $country_code
     * @param string $year
     * 
     * @return JsonResponse
     */
    public function show(string $country_code, string $year): JsonResponse
    {
        $gdp = $this->countryGdpService->getByCountryAndYear($country_code, $year);

        if (!$gdp) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        return response()->json($gdp);
    }
}