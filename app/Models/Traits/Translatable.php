<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{

    protected $defaultLocale = 'en';

    public function __($fieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;
        if ($locale === 'ru') {
            $fieldName .= '_ru';
        }

/*        if (in_array($fieldName, $this->attributes)) {
            throw new \LogicException('no such attribute');
        } */

        return $this->$fieldName;


    }
}