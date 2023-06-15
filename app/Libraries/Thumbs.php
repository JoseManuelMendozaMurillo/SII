<?php

namespace App\Libraries;

use App\Libraries\Files;
use App\Libraries\Img;

class Thumbs
{
    protected $img;
    protected $files;
    protected $dir_img;
    protected $dir_thumb;

    /**
     * constructor
     */
    public function __construct(string $dir_img = "")
    {
        $this->setDir($dir_img);
        $this->files = new Files();
        $this->img = new Img();
    }

    /**
     * setDir
     * La variable $dir_img debe contener el directorio donde se guardaran la imagenes
     *
     * @param string $dir_img
     * 
     */
    public function setDir(string $dir_img){
        $this->dir_img = $dir_img;
        $this->dir_thumb = $dir_img . "thumbs/";
    }

    /**
     * createThumbs
     * Método para crear los thumbs de la imagen, guardarlos y guardar tambien la imagen.
     * Solo se crearan los thumbs si alguna de las dimensiones de la imagen (width or height)
     * supera el valor de la variable $limit_dimension que por defecto tiene el valor de 100.
     * Las medidas (width y height) de los thumbs estaran definidas por las variables $new_wd y $new_hg
     * cuyo valor por defecto es 100.
     *
     * @param string $path_img
     * @param string $name_img
     * @param string $type_img
     * @param int $new_wd = 100
     * @param int $new_hg = 100
     * @param int $limit_dimension = 100
     * @return bool
     */
    public function createThumbs(string $path_img, string $name_img, string $type_img, int $new_wd = 100, int $new_hg = 100, int $limit_dimension = 100)//: bool
    {
        $dimensiones = getimagesize($path_img);
        $width = $dimensiones[0];
        $height = $dimensiones[1];

        // Creamos el directorio para guardar la imagen y los thumbs
        if (!$this->files->createDir($this->dir_img)) {
            return false;
        }

        // Verificamos si la imagen se debe redimensionar
        if ($width > $limit_dimension || $height > $limit_dimension) {
            return $this->redimensionarImg($path_img, $name_img, $type_img, $width, $height, $new_wd, $new_hg);
        } else {
            // Guardamos la imagen original
            $new_img = $this->dir_img . $name_img . "." . $type_img;
            return move_uploaded_file($path_img, $new_img); 
        }
    }

    /**
     * redimensionarImg
     * Función para redimensionar la imagen ($path_img) a las dimensiones (width: $new_wd y height: $new_hg)
     * y guardar la imagen redimensionada con el nombre ($name_img + $type_img)
     * 
     * @param string $path_img
     * @param string $name_img
     * @param string $type_img
     * @param int $width
     * @param int $height
     * @param int $new_wd
     * @param int $new_hg
     * @return bool
     */
    private function redimensionarImg(string $path_img, string $name_img, string $type_img, int $width, int $height, int $new_wd, int $new_hg): bool
    {

        // Creamos el directorio para guardar los thumbs
        if (!$this->files->createDir($this->dir_thumb)) {
            return false;
        }

        // Calcular la nueva altura manteniendo la relación de aspecto
        $ratio = $width / $height;
        if ($new_wd / $ratio > $new_hg) {
            $new_wd = $new_hg * $ratio;
        } else {
            $new_hg = $new_wd / $ratio;
        }

        // Creamos la ruta donde se guardara el thumb
        $new_thumb = $this->dir_thumb . $name_img . "." . $type_img;
        if ($type_img == "png") {
            $is_create_thumb = $this->img->resizeImgPng($path_img, $new_thumb, $new_wd, $new_hg);
        } else {
            $is_create_thumb = $this->img->resizeImgJpg($path_img, $new_thumb, $new_wd, $new_hg);
        }

        if($is_create_thumb){
            // Guardamos la imagen original
            $new_img = $this->dir_img . $name_img . "." . $type_img;
            return move_uploaded_file($path_img, $new_img); 
        }

        return false;
    }
}
