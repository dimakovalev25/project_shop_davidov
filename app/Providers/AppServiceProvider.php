<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Blade::directive('routeactive', function ($route_name) {
            return "<?php echo  
                         Route::currentRouteNamed(($route_name)) ? 'class=\"active\"' : ''
                    ?>";
        });
    }
}
