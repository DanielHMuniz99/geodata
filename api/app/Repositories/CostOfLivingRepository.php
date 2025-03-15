<?php

namespace App\Repositories;

use App\Models\CostOfLiving;

class CostOfLivingRepository
{
    public $costOfLivingModel;

    public function __construct(CostOfLiving $costOfLivingModel)
    {
        $this->costOfLivingModel = $costOfLivingModel;
    }

    /**
     * @param int $countryId
     */
    public function findById(int $countryId)
    {
        return $this->costOfLivingModel->where('country_id', $countryId)->first();
    }

    public function getAll()
    {
        return $this->costOfLivingModel->all();
    }
}