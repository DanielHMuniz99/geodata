<?php

namespace App\Repositories;

use App\Models\CostOfLiving;

class CostOfLivingRepository
{
    /**
     * @param int $countryId
     */
    public function findById(int $countryId)
    {
        return CostOfLiving::where('country_id', $countryId)->first();
    }

    public function getAll()
    {
        return CostOfLiving::all();
    }
}