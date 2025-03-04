<?php

namespace App\Interfaces;

interface ApiLocalidadesInterface
{
    public function getDistritosById(?int $id): array;
    public function getDistritosByUf(?string $uf): array;
    public function getDistritosByMesorregiao(?int $mesorregiao): array;
    public function getDistritosByMicrorregiao(?int $microrregiao): array;
    public function getDistritosByMunicipio(?int $municipio): array;
}