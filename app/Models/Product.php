<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function brandModel()
    {
        return $this->belongsTo(BrandModel::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
        public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
