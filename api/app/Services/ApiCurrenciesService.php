<?php

namespace App\Services;

use App\Interfaces\HttpClientInterface;

class ApiCurrenciesService
{
    protected string $baseUrl = 'https://api.currencyfreaks.com/v2.0';

    protected string $apiKey = "";

    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
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
        $data = $this->getLatestCurrencies();
        $repository->store($data);
        return $data;
    }
}
