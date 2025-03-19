<?php

namespace App\Repositories;

use App\Models\Integration;

class IntegrationRepository
{
    public $integrationModel;

    public function __construct(Integration $integrationModel)
    {
        $this->integrationModel = $integrationModel;
    }

    public function getAvailableIntegrations()
    {
        return $this->integrationModel->whereNotNull("value")->get();
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function updateOrCreate(string $key, string $value)
    {
        return $this->integrationModel->updateOrCreate(
            ["name" => $key],
            ["value" => $value]
        );
    }
}