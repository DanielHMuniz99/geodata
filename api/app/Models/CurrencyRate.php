<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrencyRate extends Model {

    use HasFactory;

    protected $table = 'currency_rates';

    protected $fillable = ['date', 'base_currency', 'rates'];

    protected $casts = [
        'rates' => 'json',
    ];
}