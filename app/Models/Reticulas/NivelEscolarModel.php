<?php

namespace App\Models\Reticulas;

use CodeIgniter\Model;

class NivelEscolarModel extends Model
{
    // db
    protected $table = 'nivel_escolar';
    protected $primaryKey = 'id_nivel_escolar';
    protected $allowedFields = [
        'nombre_nivel_escolar',
    ];
}
