<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'quotation_no',
        'names',
        'email',
        'contact',
        'size',
        'color',
        'collection_id',
        'price',
        'quantity',
        'total',
        'discount',
        'description',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
