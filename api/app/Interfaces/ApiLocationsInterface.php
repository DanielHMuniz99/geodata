<?php

namespace App\Interfaces;

interface ApiLocationsInterface
{
    public function getStates(): array;
    public function getDistrictsById(?int $id): array;
    public function getDistrictsByFederalUnit(?string $state): array;
    public function getDistrictsByMesoregion(?int $mesoregion): array;
    public function getDistrictsByMicroregion(?int $microregion): array;
    public function getDistrictsByMunicipality(?int $municipality): array;
}