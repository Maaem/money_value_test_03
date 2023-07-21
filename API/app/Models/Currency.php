<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Devise extends Model
{
    use HasFactory;

    public function paireFrom(): HasMany
    {
        return $this->hasMany(Paire::class, "from", "name");
    }

    public function paireTo(): HasMany
    {
        return $this->hasMany(Paire::class, "to", "name");
    }
}