<?php

namespace App\Providers;

use App\Services\ClipDropService;
use Illuminate\Support\ServiceProvider;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\StreamFactoryInterface;

class ClipDropServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ClipDropService::class, function ($app) {
            $apiKey = config('services.clipdrop.api_key');
            $streamFactory = $app->make(StreamFactoryInterface::class);
            return new ClipDropService($apiKey, $streamFactory);
        });

        $this->app->bind(StreamFactoryInterface::class, function () {
            return new Psr17Factory();
        });
        
    }
}

