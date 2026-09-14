<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{

    use HasFactory;



    protected $fillable = [

        'user_id',
        'name',
        'phone',
        'email',
        'address',
        'photo',
        'status',

    ];



    public function user()
    {

        return $this->belongsTo(User::class);

    }



    public function rentals()
    {

        return $this->hasMany(Rental::class);

    }


}