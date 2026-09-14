<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price_per_day',
        'stock',
        'image',
        'status',
    ];

    public function category()
{
    return $this->belongsTo(Category::class);
}

public function rentalDetails()
{
    return $this->hasMany(RentalDetail::class);
}
}