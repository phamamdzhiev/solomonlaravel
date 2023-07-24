<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    public function emails()
    {
        return $this->hasMany(RegionEmail::class, 'region_id', 'id');
    }
}
