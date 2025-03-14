<?php

namespace App\Services;

use App\Interfaces\ApiCensusInterface;
use App\Interfaces\HttpClientInterface;

class ApiCensusService implements ApiCensusInterface
{
    protected string $baseUrl = "https://servicodados.ibge.gov.br/api/v2/censos/nomes";

    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $name
     * 
     * @return array
     */
    public function getNames(string $name = ""): array
    {
        $url = "{$this->baseUrl}/{$name}";
        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }

    /**
     * @return array
     */
    public function getNamesByRanking(): array
    {
        $url = "{$this->baseUrl}/ranking";
        $response = $this->httpClient->get($url, []);
        return $this->httpClient->response($response);
    }
}
