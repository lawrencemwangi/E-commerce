<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'item_id',
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

    public function stock()
    {
        return $this->belongsToMany(Stock::class);
    }

    public function getImage()
    {
        if ($this->image && Storage::disk('public')->exists('collection/' . $this->image)) {
            return Storage::url('collection/' . $this->image);

        } else {
            // Path to your placeholder image
            return asset('assets/images/placeholder.gif');
        }
    }
}
