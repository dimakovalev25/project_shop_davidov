<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }


    public function boot(): void
    {
        View::composer(['layouts.master','categories','index' ], 'App\ViewComposers\CategoriesComposer');
        View::composer(['layouts.master','categories' ], 'App\ViewComposers\CurrenciesComposer');
    }
}
