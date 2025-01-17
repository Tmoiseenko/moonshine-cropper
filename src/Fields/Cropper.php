<?php

namespace Tmoiseenko\MoonshineCropper\Fields;

use MoonShine\AssetManager\Css;
use MoonShine\AssetManager\Js;
use MoonShine\UI\Fields\Image;

class Cropper extends Image
{
    protected string $view = 'moonshine-cropper::fields.cropper';
    protected string $accept = 'image/*';

    public function assets(): array
    {
        return [
            Css::make('vendor/moonshine-cropper/css/cropper.min.css'),
            Css::make('vendor/moonshine-cropper/css/moonshine-cropper.css'),
            Js::make(   'vendor/moonshine-cropper/js/cropper.min.js'),
            Js::make(   'vendor/moonshine-cropper/js/cropper-init.js'),
        ];
    }
}
