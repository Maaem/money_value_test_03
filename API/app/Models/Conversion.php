<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $fillable = ['pair_id', 'amount'];

    public function pair()
    {
        return $this->belongsTo(Pair::class, 'pair_id');
    }
}
