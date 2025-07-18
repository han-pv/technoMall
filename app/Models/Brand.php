<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function brandModels()
    {
        return $this->hasMany(BrandModel::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
