<?php

namespace App\Services;

use App\Repositories\IntegrationRepository;

class IntegrationService
{
    protected $integrationRepository;

    public function __construct(IntegrationRepository $integrationRepository)
    {
        $this->integrationRepository = $integrationRepository;
    }

    /**
     * @return array
     */
    public function getAvailableIntegrations()
    {
        return $this->integrationRepository->getAvailableIntegrations();
    }

    /**
     * @return array
     */
    public function updateOrCreate(string $key, string $value)
    {
        return $this->integrationRepository->updateOrCreate($key, $value);
    }
}