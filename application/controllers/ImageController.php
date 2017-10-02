<?php
/**
 * Created by PhpStorm.
 * User: Neon Dotta
 * Date: 27/09/2017
 * Time: 08:47
 */

class ImageController extends CI_Controller
{
    public function verifyName($name)
    {
        $fileName = substr($name, 0, strpos($name,'.')).'-'.time().strrchr($name, '.');
        return $fileName;
    }

    public function validateUpload(array $picture, $name, $address)
    {
        $image = "";

        switch ($picture['type']) {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                $image = imagecreatefromjpeg($picture['tmp_name']);
                break;
            case 'image/png':
            case 'image/x-png':
                $image = imagecreatefrompng($picture['tmp_name']);
                break;
        }

        if(!$picture){
            return false;
        }

        $x = imagesx($image);
        $y = imagesy($image);
        $imageX = ($x > 1024 ? 1024 : $x);
        $imageY = ($imageX * $y) / $x;
        $newImage = imagecreatetruecolor($imageX, $imageY);
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $imageX, $imageY, $x, $y);


        switch ($picture['type']) {
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/pjpeg':
                imagejpeg($newImage, $address . $name);
                break;
            case 'image/png':
            case 'image/x-png':
                imagepng($newImage, $address . $name);
                break;
        }

        move_uploaded_file($newImage, $address . $name);

        imagedestroy($image);
        imagedestroy($newImage);

        return true;
    }


}