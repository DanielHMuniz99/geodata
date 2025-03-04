<?php

namespace App\Services;

use App\Interfaces\ApiCensusInterface;
use Illuminate\Support\Facades\Http;

class ApiCensusService implements ApiCensusInterface
{
    protected string $baseUrl = "https://servicodados.ibge.gov.br/api/v2/censos/nomes";

    public function getNames(string $name = ""): array
    {
        return Http::get("{$this->baseUrl}/{$name}")->json();
    }

    public function getNamesByRanking(): array
    {
        return Http::get("{$this->baseUrl}/ranking")->json();
    }
}
