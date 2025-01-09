<?php

declare(strict_types=1);

namespace Tmoiseenko\MoonshineCropper\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Tmoiseenko\MoonshineCropper\Controllers\CropperController;

final class CropperServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'moonshine-cropper');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'moonshine-cropper');

        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/moonshine-cropper'),
        ], ['moonshine-cropper-assets', 'laravel-assets']);

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->publishesMigrations(
            [__DIR__ . '/../../database/migrations' => database_path('migrations')],
            ['moonshine-cropper-migration']);
    }
}
