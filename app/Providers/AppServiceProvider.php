<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('flightStatus', function ($expression) {
            switch ($expression) {
                case '1':
                    $status = 'Delayed';
                    break;
                case '2':
                    $status = 'Departed';
                    break;
                case '3':
                    $status = 'Cancelled';
                    break;

                default:
                    $status = '';
                    break;
            }
            return "<?php echo ($status); ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
