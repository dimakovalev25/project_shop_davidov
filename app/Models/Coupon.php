<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class);

    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

}
