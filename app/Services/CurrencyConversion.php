<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyConversion
{
    public static function convert($sum, $originCurrencyCode = 'BY', $targetCurrencyCode = null)
    {
        $originCurrency = Currency::byCode($originCurrencyCode)->first();
        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = session('currency', 'BY');
        }

        $targetCurrency = Currency::byCode($targetCurrencyCode)->first();

        return $sum / $originCurrency->rate * $targetCurrency->rate;
    }


    public static function getCurrencySymbol()
    {
        $currency = Currency::byCode(session('currency', 'BY'))->first();
        return $currency->symbol;
    }
}