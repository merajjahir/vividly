<?php

namespace App\Providers;

use App\Services\ClipDropService;
use Illuminate\Support\ServiceProvider;

class ClipDropServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ClipDropService::class, function () {
            $apiKey = config('services.clipdrop.api_key');
            return new ClipDropService($apiKey);
        });
    }
}

