<?php

namespace App\Models;

use CodeIgniter\Model;

class AspiranteModel extends Model
{
    // TODO: Cambiar el nombre de la tabla si es que se requiere
    protected $table = 'aspirantes';
    protected $allowedFields = [
        // TODO: Asignar los campos permitidos
        // 'username', 'email', 'password',
    ];
    protected $returnType = \App\Entities\Aspirante::class;
    protected $useTimestamps = true;
}
