<?php

namespace tests\library\ThumbnailsGeneratorResize;
use PHPUnit\Framework\TestCase;
use src\library\ThumbnailsGeneratorResize\Thumb;

class ThumbTest extends TestCase {
    public function testThumbGenerator() {
        $th = new Thumb();
        $file = $th->onlineThumb("http://adevarul.ro/assets/adevarul.ro/MRImage/2015/08/07/55c47339f5eaafab2c552537/646x404.jpg", 100, 100, 3);
        echo $file;
        $this->assertFileExists($file);
    }
}