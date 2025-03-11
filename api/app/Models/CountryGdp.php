<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryGdp extends Model
{
    use HasFactory;

    protected $table = 'country_gdp';

    protected $fillable = [
        'country_id',
        'year',
        'gdp_growth',
        'gdp_nominal',
        'gdp_per_capita_nominal',
        'gdp_ppp',
        'gdp_per_capita_ppp',
        'gdp_ppp_share'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}