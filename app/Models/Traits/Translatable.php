<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{

    protected $defaultLocale = 'en';

    public function __($originFieldName)
    {
        $locale = App::getLocale() ?? $this->defaultLocale;

        if ($locale === 'ru') {
            $fieldName = $originFieldName.'_ru';
        } else {
            $fieldName = $originFieldName;
        }

/*        if (in_array($fieldName, $this->attributes)) {
            throw new \LogicException('no such attribute');
        } */

        if ($locale === 'ru' && (is_null($this->$fieldName) || empty($this->$fieldName))) {
            return  $this->$originFieldName;
        }

        return $this->$fieldName;


    }
}