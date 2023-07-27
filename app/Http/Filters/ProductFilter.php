<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const PRICE_FROM = 'price_from';
    public const PRICE_TO = 'price_to';
    public const HIT_PRODUCT = 'hit';
    public const NEW_PRODUCT = 'new';
    public const RECOMMEND_PRODUCT = 'recommend';

    protected function getCallbacks(): array
    {
        return [
            self::PRICE_FROM => [$this, 'price_from'],
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
}