<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model {

    protected $table = 'countries';

    public function gdp()
    {
        return $this->hasOne(CountryGdp::class);
    }
}