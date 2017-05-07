<?php

namespace src\library\ThumbnailsGeneratorResize;

class Thumb {
    private static $path = "./tmp/thumbs/";

    public function onlineThumb($img, $maxWidth, $maxHeight=0) {
        
        list($oWidth, $oHeight, $image_type) = getimagesize($img);

        switch ($image_type) {
            case 1: 
                $im = imagecreatefromgif($img);
                $ext = ".gif";
                break;
            case 2:
                $im = imagecreatefromjpeg($img);
                $ext = ".jpg";
                break;
            case 3:
                $im = imagecreatefrompng($img);
                $ext = ".png";
                break;
        }

        $fileDestination = self::$path.$maxWidth."_".$maxHeight."_".md5($img).$ext;

        if(self::thumbExists($fileDestination)) {
            return $fileDestination;
        }
        
        if($maxHeight == 0) $maxHeight = $oHeight * $maxWidth / $oWidth;

        $newImg = imagecreatetruecolor($maxWidth, $maxHeight);

        if (($image_type == 1) || ($image_type == 3)) {
            imagealphablending($newImg, false);
            imagesavealpha($newImg, true);
            $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 1277);
            imagefilledrectangle($newImg, 0, 0, $maxWidth, $maxHeight, $transparent);
        }

        imagecopyresampled($newImg,$im, 0, 0, 0, 0, $maxWidth, $maxHeight, $oWidth, $oHeight);

        switch ($image_type) {
            case 1:
                imagegif($newImg, $fileDestination, 100);
                break;
            case 2:
                imagejpeg($newImg, $fileDestination, 100);
                break;
            case 3:
                imagepng($newImg, $fileDestination, 100);
                break;
        }
        imagedestroy($newImg);
        return $fileDestination;
    }

    private function thumbExists($img) {
        if(file_exists($img)) return true;

        return false;
    }
}

