<?php

namespace App\Models;

use App\Models\Wine;

class WineType extends Model
{
    public function wines() {
        return $this->hasMany(Wine::class);
    }
}
