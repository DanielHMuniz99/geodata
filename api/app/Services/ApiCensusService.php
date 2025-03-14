<?php

namespace App\Services;

use App\Interfaces\ApiCensusInterface;
use Illuminate\Support\Facades\Http;

class ApiCensusService implements ApiCensusInterface
{
    protected string $baseUrl = "https://servicodados.ibge.gov.br/api/v2/censos/nomes";

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
