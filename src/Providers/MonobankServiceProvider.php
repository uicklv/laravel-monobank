<?php
declare(strict_types=1);

namespace Uicklv\LaravelMonobank\Providers;

use Illuminate\Support\ServiceProvider;
use Uicklv\LaravelMonobank\Acquiring;
use Uicklv\LaravelMonobank\MonobankClient;
use Uicklv\LaravelMonobank\Services\MonobankService;

class MonobankServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MonobankService::class, function () {
            $httpClient = new \GuzzleHttp\Client([
                'base_uri' => config('monobank.url'),
                'headers' => [
                    'X-Token' => config('monobank.token'),
                ]
            ]);
            $monobankClient = new MonobankClient($httpClient);
            $acquiring = new Acquiring($monobankClient);

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
