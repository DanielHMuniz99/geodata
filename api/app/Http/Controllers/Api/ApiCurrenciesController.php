<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiCurrenciesService;
use App\Repositories\CurrencyRateRepository;
use App\Repositories\CountryCurrencyRepository;
use Illuminate\Http\JsonResponse;

class ApiCurrenciesController extends Controller
{
    protected $apiCurrenciesService;

    protected $currencyRateRepository;

    protected $countryCurrencyRepository;

    public function __construct(
        ApiCurrenciesService $apiCurrenciesService,
        CurrencyRateRepository $currencyRateRepository,
        CountryCurrencyRepository $countryCurrencyRepository
    ) {
        $this->apiCurrenciesService = $apiCurrenciesService;
        $this->currencyRateRepository = $currencyRateRepository;
        $this->countryCurrencyRepository = $countryCurrencyRepository;
    }

        /**
     * @return JsonResponse
     */
    public function getCurrency(): JsonResponse
    {
        $response = $this->currencyRateRepository->getCurrency();
        if (!$response) {
            $response = $this->apiCurrenciesService->update();
        }

        $data = $this->countryCurrencyRepository->getAll();
        $cotacoes = json_decode($response->rates, true);

        $currencies = [];
        foreach ($data as $currency) {
            $currencies[] = [
                "currency_code" => $currency["currency"],
                "name" => $currency["name"],
                "code" => $currency["code"],
                "currency" => $cotacoes[$currency["currency"]],
            ];
        }

        return response()->json($currencies);
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