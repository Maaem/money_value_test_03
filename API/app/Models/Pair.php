<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    protected $fillable = ['source_currency_id', 'target_currency_id', 'exchange_rate', 'conversion_count'];

    public function sourceCurrency()
    {
        return $this->belongsTo(Currency::class, 'source_currency_id');
    }

    public function targetCurrency()
    {
        return $this->belongsTo(Currency::class, 'target_currency_id');
    }

    public function conversions()
    {
        return $this->hasMany(Conversion::class, 'pair_id', 'id');
    }
}
