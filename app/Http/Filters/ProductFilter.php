<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORY_ID = 'category_id';
    public const APPLE_IPHONE = 'iphone';
    public const APPLE_WATCH = 'watch';
    public const APPLE_MAC = 'mac';
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';
    public const HIT_PRODUCT = 'hit';
    public const NEW_PRODUCT = 'new';
    public const RECOMMEND_PRODUCT = 'recommend';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY_ID => [$this, 'category_id'],
            self::PRICE_FROM => [$this, 'price_from'],
            self::APPLE_IPHONE => [$this, 'iphone'],
            self::APPLE_WATCH => [$this, 'watch'],
            self::APPLE_MAC => [$this, 'mac'],
            self::PRICE_TO => [$this, 'price_to'],
            self::HIT_PRODUCT => [$this, 'hit'],
            self::NEW_PRODUCT => [$this, 'new'],
            self::RECOMMEND_PRODUCT => [$this, 'recommend'],
        ];
    }

    public function price_from(Builder $builder, $value)
    {
        $builder->where('price', '>=', $value);
    }
    public function price_to(Builder $builder, $value)
    {
        $builder->where('price', '<=', $value);
    }
    public function hit(Builder $builder, $value)
    {
        $builder->where('hit', '=', 1);
    }
    public function new(Builder $builder, $value)
    {
        $builder->where('new', '=', 1);
    }
    public function recommend(Builder $builder, $value)
    {
        $builder->where('recommend', '=', 1);
    }
    public function iphone(Builder $builder, $value)
    {
        $builder->where('category_id', '=', 17);
    }
    public function category_id(Builder $builder, $value)
    {
        $builder->where('category_id', '=', $value);
    }
    public function watch(Builder $builder, $value)
    {
        $builder->where('category_id', '=', 19);
    }
    public function mac(Builder $builder, $value)
    {
        $builder->where('category_id', '=', 24);
    }
}