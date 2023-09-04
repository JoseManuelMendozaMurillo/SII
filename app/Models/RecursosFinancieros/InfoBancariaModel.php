<?php

namespace App\Models\RecursosFinancieros;

use CodeIgniter\Model;

class InfoBancariaModel extends Model
{
    protected $table = 'informacion_bancaria';
    protected $allowedFields = [
        'banco',
        'sucursal',
        'cuenta',
        'rfc',
        'costo_semestre',
        'costo_examen',
        'costo_constancia',
        'costo_verano',
    ];

    public function getData($id = 1)
    {
        return $this->select()->where('id_banco', $id)->first();
    }
}
