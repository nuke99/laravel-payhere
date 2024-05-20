<?php

namespace Workbench\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lines(): MorphMany
    {
        return $this->morphMany(OrderLine::class, 'purchasable');
    }
}