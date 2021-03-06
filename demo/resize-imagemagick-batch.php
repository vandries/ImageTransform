<?php

namespace ImageTransform\Demo;

require __DIR__.'/../src/autoload.php';

use ImageTransform\Image\ImageMagick as Image;
use ImageTransform\Transformation;
use ImageTransform\Transformation\Resizer\ImageMagick as Resizer;

// REGISTER TRANSFORMATION CALLBACKS
Transformation::addTransformation(new Resizer());

// INSTANTIATION
$transformation = new Transformation();

// CONFIGURING TRANSFORMATION STACK
$transformation->resize(100, 100, Resizer::PROPORTIONAL | Resizer::MINIMUM);

// PROCESSING IMAGES
$files = glob(__DIR__.'/images/*.jpg');
foreach($files as $filepath)
{
  $image = new Image($filepath);
  $transformation($image);
  $image->saveAs(__DIR__.'/_resized-imagemagick-batch-'.basename($filepath));
}
