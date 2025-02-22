<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Providers;

use Illuminate\Support\ServiceProvider;
use Uicklv\LaravelMonobank\Services\MonobankService;

class MonobankServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(MonobankService::class, function () {
            return new MonobankService();
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/monobank.php' => config_path('monobank.php'),
        ], 'config');
    }
}
