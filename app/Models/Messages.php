<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
        'names',
        'email',
        'message'
    ];

     public function stock()
    {
        return $this->belongsTo(Stock::class, 'item_id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'item_id');
    }
}
