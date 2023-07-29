<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sku extends Model
{
    use SoftDeletes;

    protected $fillable = ['product_id', 'count', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function skus()
    {
        return $this->belongsToMany(PropertyOptions::class);
    }
}
