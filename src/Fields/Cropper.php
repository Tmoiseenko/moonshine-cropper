<?php

namespace Tmoiseenko\MoonshineCropper\Fields;

use MoonShine\Fields\Image;

class Cropper extends Image
{
    protected string $view = 'moonshine-cropper::fields.cropper';
    protected string $accept = 'image/*';
}
