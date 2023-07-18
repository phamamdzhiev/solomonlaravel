<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalFarm extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = ['owner', 'farm_number', 'region', 'city', 'vet'];
}
