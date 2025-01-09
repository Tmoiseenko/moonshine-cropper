<?php

use Illuminate\Support\Facades\Route;
use Tmoiseenko\MoonshineCropper\Controllers\CropperController;

Route::group(moonshine()->configureRoutes(), static function (): void {
    Route::middleware(config('moonshine.auth.middleware', []))->group(function (): void {
        Route::prefix('cropper')->controller(CropperController::class)
            ->group(function (): void {
                Route::post('files', 'upload')
                    ->name('cropper.upload');

                Route::delete('files/{id}', 'destroy')
                    ->name('cropper.destroy');

                Route::put('files/post/{id}', 'update')
                    ->name('cropper.update');
            });
    });
});
