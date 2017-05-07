<?php

namespace tests\library\ThumbnailsGeneratorResize;

use PHPUnit\Framework\TestCase;
use src\library\ThumbnailsGeneratorResize\Thumb;
use src\library\ClaviskaImageModificationSuite\SimpleImage;

class SimpleImageTest extends TestCase
{
    public function testThumbGenerator()
    {
        try {
          // Create a new SimpleImage object
            $image = new SimpleImage();

          // Manipulate it
            $image
            ->fromFile('http://adevarul.ro/assets/adevarul.ro/MRImage/2015/08/07/55c47339f5eaafab2c552537/646x404.jpg')              // load parrot.jpg
            ->autoOrient()                        // adjust orientation based on exif data
            ->bestFit(300, 600)                   // proportinoally resize to fit inside a 250x400 box
            ->flip('x')                           // flip horizontally
            ->colorize('DarkGreen')               // tint dark green
            ->border('black', 5)                  // add a 5 pixel black border
            ->overlay('./tmp/flag.png', 'bottom right') // add a watermark image
            ->toFile('./tmp/image.png');                         // output to the screen
        } catch (Exception $err) {
                  // Handle errors
                  echo $err->getMessage();
        }
    }
}
