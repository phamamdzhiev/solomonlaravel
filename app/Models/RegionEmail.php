<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionEmail extends Model
{
    public $timestamps = false;

    protected $fillable = ['region_id', 'email'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
