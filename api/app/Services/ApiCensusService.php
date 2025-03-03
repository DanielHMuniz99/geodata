<?php

namespace App\Services;

use App\Interfaces\ApiCensusInterface;
use Illuminate\Support\Facades\Http;

class ApiCensusService implements ApiCensusInterface
{
    private $baseUrl = "https://servicodados.ibge.gov.br/api/v2/censos/nomes";

    public function getNames(string $name = "")
    {
        return Http::get("{$this->baseUrl}/{$name}")->json();
    }

    public function getNamesByRanking()
    {
        return Http::get("{$this->baseUrl}/ranking")->json();
    }
}
