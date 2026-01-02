<?php

namespace Hsuan\Listmonk;

use Hsuan\Listmonk\Http\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;

class ListmonkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $path = __DIR__ . '/../config/listmonk.php';
        if (file_exists($path)) {
            $this->mergeConfigFrom($path, 'listmonk');
        }

        $this->app->scoped(Client::class, function ($app) {
            $config = $app['config']['listmonk'];

            return new Client(
                Http::baseUrl($config['endpoint'])
                    ->withHeaders([
                        'Authorization' => 'token ' . $config['api']['user'] . ':' . $config['api']['token'],
                        'Accept' => 'application/json',
                    ])
            );
        });

        $this->app->singleton('listmonk', function ($app) {
            return new Listmonk($app->make(Client::class));
        });
    }

    public function boot()
    {dump(__DIR__ . '/../config/listmonk.php');
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/listmonk.php' => config_path('listmonk.php'),
            ], 'listmonk-config');
        }
    }
}
