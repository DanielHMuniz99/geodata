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

    public function getAll()
    {
        return $this->integrationModel->all();
    }
}