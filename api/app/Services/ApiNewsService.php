<?php

namespace App\Services;

use App\Interfaces\ApiNewsInterface;
use App\Interfaces\HttpClientInterface;

class ApiNewsService implements ApiNewsInterface
{
    protected string $baseUrl = 'https://servicodados.ibge.gov.br/api/v3/noticias';

    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $lang
     * 
     * @return array
     */
    public function getNews(string $lang): array
    {
        $url = "{$this->baseUrl}?lang={$lang}";
        $response = $this->httpClient->get($url);
        return $this->httpClient->response($response);
    }
}