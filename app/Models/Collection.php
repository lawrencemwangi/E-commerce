<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'price',
        'featured',
        'visibility',
        'in_stock',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
