<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Providers;

use Illuminate\Support\ServiceProvider;
use Uicklv\LaravelMonobank\Acquiring;
use Uicklv\LaravelMonobank\Services\MonobankService;

class MonobankServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MonobankService::class, function () {
            //todo check config ?
            $httpClient = new \GuzzleHttp\Client([
                'base_uri' => config('monobank.url'),
                'headers' => [
                    'X-Token' => config('monobank.token'),
                ]
            ]);

            $acquiring = new Acquiring($httpClient);

            return new MonobankService($acquiring);
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/monobank.php' => config_path('monobank.php'),
        ], 'monobank-config');
    }
}
