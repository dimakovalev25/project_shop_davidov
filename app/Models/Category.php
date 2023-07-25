<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['code', 'name', 'description', 'image', 'description_ru', 'name_ru'];
    use Translatable;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}

