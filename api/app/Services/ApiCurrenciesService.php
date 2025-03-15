<?php

namespace App\Services;

use App\Interfaces\HttpClientInterface;
use App\Repositories\CurrencyRateRepository;

class ApiCurrenciesService
{
    protected string $baseUrl = 'https://api.currencyfreaks.com/v2.0';

    protected string $apiKey = "";

    protected $currencyRateRepository;

    protected $httpClient;

    public function __construct(
        HttpClientInterface $httpClient,
        CurrencyRateRepository $currencyRateRepository
    ) {
        $this->httpClient = $httpClient;
        $this->currencyRateRepository = $currencyRateRepository;
        $this->apiKey = env("API_CURRENCY_FREAKS");
    }

    public function getLatestCurrencies()
    {
        $url = "{$this->baseUrl}/rates/latest?apikey={$this->apiKey}";
        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    public function updateCurrencies()
    {
        $currenciesRate = $this->currencyRateRepository->store($this->getLatestCurrencies());
        return $currenciesRate;
    }
}
