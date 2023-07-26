<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyConversion
{

    protected static $container;


    public static function loadContainer()
    {
        if (is_null(self::$container)) {
            $currensies = Currency::all();
            foreach ($currensies as $currency) {
                self::$container[$currency->code] = $currency;

            }
        }


    }

    public static function convert($sum, $originCurrencyCode = 'BY', $targetCurrencyCode = null)
    {
        self::loadContainer();
//        $originCurrency = Currency::byCode($originCurrencyCode)->first();
        $originCurrency = self::$container[$originCurrencyCode];
        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = session('currency', 'BY');
        }

            $targetCurrency = self::$container[$targetCurrencyCode];
//        $targetCurrency = Currency::byCode($targetCurrencyCode)->first();

        return $sum / $originCurrency->rate * $targetCurrency->rate;
    }


    public static function getCurrencySymbol()
    {
        self::loadContainer();
        $currenctGromSession = session('currency', 'BY');

//        $currency = Currency::byCode(session('currency', 'BY'))->first();
        $currency = self::$container[$currenctGromSession];
        return $currency->symbol;
    }
}