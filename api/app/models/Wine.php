<?php

namespace App\Models;

use App\Models\WineType;

class Wine extends Model
{
    public function type() {
        return $this->belongsTo(WineType::class);
    }
}
