<?php

namespace Kartikey\PanelPulse;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class PanelPulseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'PanelPulse');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');

        $this->publishes([
            __DIR__ . '/../publishable/assets' => public_path('/assets/'),
        ], 'public');

        if (File::exists(__DIR__ . '\Helper\CommonHelper.php')) {
            require __DIR__ . '\Helper\CommonHelper.php';
        }
    }

    public function register()
    {
        //
    }
}
