<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyConversion
{
    public const DEFAULT_CURRENCY_CODE = 'BY';
    protected static $container;

    public static function getCurrencyFromSession()
    {
        return session('currency', self::DEFAULT_CURRENCY_CODE);
    }

    public static function getCurrentCurrencyFromSession()
    {
        self::loadContainer();
        $currencyCode = self::getCurrencyFromSession();
        foreach (self::$container as $currency) {
            if ($currency->code === $currencyCode) {
                return $currency;
            }
        }
    }

    public static function loadContainer()
    {
        if (is_null(self::$container)) {
            $currensies = Currency::all();
            foreach ($currensies as $currency) {
                self::$container[$currency->code] = $currency;
            }
        }
    }

    public static function convert($sum, $originCurrencyCode = self::DEFAULT_CURRENCY_CODE, $targetCurrencyCode = null)
    {
        self::loadContainer();
        $originCurrency = self::$container[$originCurrencyCode];

 /*       if ($originCurrency->code != self::DEFAULT_CURRENCY_CODE) {

        }*/

        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = self::getCurrencyFromSession();
        }
        $targetCurrency = self::$container[$targetCurrencyCode];
        return $sum / $originCurrency->rate * $targetCurrency->rate;
    }

    public static function getCurrencySymbol()
    {
        self::loadContainer();
        $currenctFromSession = self::getCurrencyFromSession();
        $currency = self::$container[$currenctFromSession];
        return $currency->symbol;
    }
}