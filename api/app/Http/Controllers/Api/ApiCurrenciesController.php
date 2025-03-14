<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiCurrenciesService;
use App\Repositories\CurrencyRateRepository;
use Illuminate\Http\JsonResponse;

class ApiCurrenciesController extends Controller
{
    protected $apiCurrenciesService;

    protected $currencyRateRepository;

    public function __construct(
        ApiCurrenciesService $apiCurrenciesService,
        CurrencyRateRepository $currencyRateRepository
    ) {
        $this->apiCurrenciesService = $apiCurrenciesService;
        $this->currencyRateRepository = $currencyRateRepository;
    }

        /**
     * @return JsonResponse
     */
    public function getCurrency(): JsonResponse
    {
        $response = $this->currencyRateRepository->getCurrency();
        return response()->json(json_decode($response->rates, true));
    }

    /**
     * @return JsonResponse
     */
    public function getLatestCurrencies(): JsonResponse
    {
        $response = $this->apiCurrenciesService->getLatestCurrencies();
        return response()->json($result);
    }

    /**
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        $response = $this->apiCurrenciesService->getLatestCurrencies();
        $data = $this->currencyRateRepository->store($response);
        return response()->json($data);
    }
}