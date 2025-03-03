<?php

namespace App\Interfaces;

interface ApiCensusInterface
{
    public function getNames(string $name): array;
    public function getNamesByRanking(): array;
}
