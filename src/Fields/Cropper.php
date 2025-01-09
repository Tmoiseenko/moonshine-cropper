<?php

namespace Tmoiseenko\MoonshineCropper\Fields;

use MoonShine\Fields\Image;

class Cropper extends Image
{
    protected string $view = 'moonshine-cropper::fields.cropper';

    protected string $accept = 'image/*';

    protected array $assets = [
        'vendor/moonshine-cropper/css/cropper.min.css',
        'vendor/moonshine-cropper/css/moonshine-cropper.css',
        'vendor/moonshine-cropper/js/cropper.min.js',
        'vendor/moonshine-cropper/js/cropper-init.js',
    ];
}
