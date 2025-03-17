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
    public function getAll(): array
    {
        return $this->integrationRepository->getAll();
    }
}