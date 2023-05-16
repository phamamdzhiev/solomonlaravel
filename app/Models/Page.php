<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded  = [];

    public function contents() {
        return $this->hasOne(PageContent::class, 'page_id');
    }
}
