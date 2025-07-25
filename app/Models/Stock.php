<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'item_name',
        'quantity',
        'low_stock_alert',
        'description',
    ];

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }
}
