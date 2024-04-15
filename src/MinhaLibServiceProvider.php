<?php

namespace Minhalib;

use Illuminate\Support\ServiceProvider;

class MinhaLibServiceProvider extends ServiceProvider
{
    public function boot()
    {
        
        // Publish all resources
        $this->publishResources();
    }

    protected function publishResources()
    {
        $resources = [
            __DIR__.'/Controllers' => app_path('Http/Controllers/Teclib'),
            __DIR__.'/Enums' => app_path('Enums/Teclib'),
            __DIR__.'/Repositories' => app_path('Repositories/Teclib'),
            __DIR__.'/Services' => app_path('Services/Teclib'),
            __DIR__.'/../routes' => base_path('routes'),
        ];

        // php artisan vendor:publish --tag=teclib-resources
        foreach ($resources as $source => $destination) {
            $this->publishes([$source => $destination], 'teclib-resources');
        }
    }

    public function register()
    {}
}