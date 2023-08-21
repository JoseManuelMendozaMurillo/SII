<?php

namespace App\Libraries;

use Exception;
use Mpdf\Tag\Em;

class Files
{
    public function __construct()
    {
        // Constructor
    }

    /**
     * findFfile
     * Función que busca un archivo, la función devuelve el path del archivo que
     * se esta buscando si lo encuentra, si no encuentra el archivo devuelve false
     *
     * @param string $filename
     *
     * @return string | bool
     */
    public function findFile(string $filename)
    {
        $files = glob($filename . '.*');

        return (count($files) > 0) ? $files[0] : false;
    }

    /**
     * countFiles
     * Función que cuenta la cantidad de archivos que tienen un mismo nombre
     *
     * @param string $filename
     *
     * @return int
     */
    public function countFiles(string $filename): int
    {
        return count(glob($filename . '.*'));
    }

    /**
     * createDir
     * Funcion para crear un nuevo directorio si esque este no existe
     *
     * @param string $path_dir
     *
     * @return bool
     */
    public function createDir(string $path_dir): bool
    {
        // Sí el directorio ya exite retornamos true
        if (is_dir($path_dir)) {
            return true;
        }
        // Sí el directorio no existe, lo creamos
        return mkdir($path_dir);
    }

    /**
     * deleteDir
     * Funcion para eliminar un directorio si es que este existe
     *
     * @param string $pathDir -> Ruta completa de la carpeta a eliminar
     *
     * @throws Exception -> Se lanza si la dirección no es una carpeta válida
     *
     * @return bool
     */
    public function deleteDir(string $pathDir): bool
    {
        if (!file_exists($pathDir)) {
            return true;
        }

        if (!is_dir($pathDir)) {
            throw new Exception('La dirección especificada no es una carpeta válida');
        }

        $files = glob($pathDir . '/*');
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->deleteDir($file);
            } else {
                unlink($file); // Eliminar archivo
            }
        }

        return rmdir($pathDir); // Eliminar carpeta vacía
    }
}
