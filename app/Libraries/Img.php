<?php

namespace App\Libraries;


class Img
{

    public function __construct()
    {
        // Constructor
    }

    /**
     * cropImgPng
     * Funcion que recorta una imagen segun las cordenadas pasadas como parametro y guarda la nueva 
     * imagen con extensión png en la ruta especificada
     * 
     * @param string $path
     * @param array $coordenadas
     * @return bool
     */
    public function cropImgPng($path, $coordenadas)
    {
        $original = '';
        $original = imagecreatefrompng($path);
        $copia = imagecrop($original, ['x' => $coordenadas['x'], 'y' => $coordenadas['y'], 'width' => $coordenadas['w'], 'height' => $coordenadas['h']]);
        return imagepng($copia, $path);
    }

    /**
     * cropImgJpg
     * Funcion que recorta una imagen segun las cordenadas pasadas como parametro y guarda la nueva 
     * imagen con extensión jpg en la ruta especificada
     * 
     * @param string $path
     * @param array $coordenadas
     * @return bool
     */
    public function cropImgJpg($path, $coordenadas)
    {
        $original = '';
        $original = imagecreatefromjpeg($path);
        $copia = imagecrop($original, ['x' => $coordenadas['x'], 'y' => $coordenadas['y'], 'width' => $coordenadas['w'], 'height' => $coordenadas['h']]);
        return imagejpeg($copia, $path);
    }

    /**
     * 
     * 
     */
    public function resizeImgJpg($pathResizeImg, $pathSaveNewImg, $newWidth, $newHeight){
        // Creamos la imagen que queremos redimensionar
        $imgOriginal = imagecreatefromjpeg($pathResizeImg);
        // Obtenemos el width y el height
        $oldWidth = imagesx($imgOriginal);
        $oldHeight = imagesy($imgOriginal);
        // Creamos un contenedor para la nueva imagen
        $newImg = imagecreatetruecolor($newWidth, $newHeight);
        // Redimensionamos la imagen
        imagecopyresampled($newImg,$imgOriginal,0,0,0,0,$newWidth,$newHeight,$oldWidth,$oldHeight);
        // Guardamos la nueva imagen en el destino
        return imagejpeg($newImg,$pathSaveNewImg,100);
    } 

    /**
     * 
     * 
     */
    public function resizeImgPng($pathResizeImg, $pathSaveNewImg, $newWidth, $newHeight){
        // Creamos la imagen que queremos redimensionar
        $imgOriginal = imagecreatefrompng($pathResizeImg);
        // Obtenemos el width y el height
        $oldWidth = imagesx($imgOriginal);
        $oldHeight = imagesy($imgOriginal);
        // Creamos un contenedor para la nueva imagen
        $newImg = imagecreatetruecolor($newWidth, $newHeight);
        // Redimensionamos la imagen
        imagecopyresampled($newImg,$imgOriginal,0,0,0,0,$newWidth,$newHeight,$oldWidth,$oldHeight);
        // Guardamos la nueva imagen en el destino
        return imagepng($newImg,$pathSaveNewImg);
    } 
}