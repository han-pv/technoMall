<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function brandModels()
    {
        return $this->hasMany(BrandModel::class);
    }
    public function getName()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->name_tm ?: $this->name;
        } else if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        }
        return $this->name;
    }
}
