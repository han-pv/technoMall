<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'brand_id',
        'brand_model_id',
        'color_id',
        'slug',
        'title',
        'title_tm',
        'title_ru',
        'description',
        'description_tm',
        'description_ru',
        'image',
        'price',
        'is_stock',
        'is_discount',
        'discount_precent',
        'discount_expires_in',
        'viewed',
        'rating',
    ];

    protected $casts = [
        'is_stock' => 'boolean',
        'is_discount' => 'boolean',
        'discount_expires_in' => 'datetime',
    ];

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTitle()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->title_tm ?: $this->title;
        } else if ($locale == 'ru') {
            return $this->title_ru ?: $this->title;
        }
        return $this->title;
    }

    public function getDescription()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->description_tm ?: $this->description;
        } else if ($locale == 'ru') {
            return $this->description_ru ?: $this->description;
        }
        return $this->description;
    }
}