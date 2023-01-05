<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::component('components.message', 'message');
        \Blade::component('components.btnDelete', 'btnDelete');
        \Blade::directive('money', function ($amount) {
            return "<?php echo 'R$ ' . number_format($amount, 2,','); ?>";
        });
    }
}
