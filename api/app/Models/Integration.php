<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Integration extends Model
{
    protected $fillable = ['name', 'value'];

    public function getValueAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = Crypt::encryptString($value);
    }
}
