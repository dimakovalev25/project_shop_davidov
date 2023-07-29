<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use App\Models\Traits\Translatable;
use App\Services\CurrencyConversion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use Translatable;
    use Filterable;


    protected $fillable = ['code', 'name', 'description', 'image', 'price', 'category_id', 'new', 'hit', 'recommend',
        'count', 'description_ru', 'name_ru'];

    public function getCategory()
    {
        return $category = Category::find($this->category_id);

    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);

    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function isAvailable()
    {
        return $this->count > 0;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    public function isHit()
    {
        return $this->hit === 1;
    }

    public function isNew()
    {
        return $this->new === 1;
    }

    public function isRecommend()
    {
        return $this->recommend === 1;
    }


    public function getPriceAttribute($value)
    {
        return round(CurrencyConversion::convert($value), 2);
    }

/*    public function getCurrencyAttribute()
    {
        return session('currency', 'BY');
    }*/
}
