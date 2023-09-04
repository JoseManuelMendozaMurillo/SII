<?php

namespace App\Models\Aspirantes;

use CodeIgniter\Model;

class ComplementAspiranteModel extends Model
{
    // Configuracion del modelo
    protected $table = 'aspirantes_datos_complementarios';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_aspirante',
        'calle_domicilio',
        'no_exterior',
        'no_interior',
        'letra_exterior',
        'letra_interior',
        'colonia',
        'estado',
        'municipio',
        'codigo_postal',
        'entre_calles',
        'tutor',
        'estado_procedencia',
        'comunidad_indigena',
        'tipo_sangre',
        'discapacidad',
        'lengua_indigena',
        'telefono_contacto',
        'nivel_estudio_padre',
        'nivel_estudio_madre',
        'vives_actualmente',
        'ocupacion_padre',
        'ocupacion_madre',
        'casa_resides',
        'no_cuartos',
        'no_miembros',
        'no_banos',
        'regadera',
        'no_focos',
        'tipo_piso',
        'no_automoviles',
        'estufa',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    /**
     * deleteAspirante
     * Función para eliminar los datos complementarios de un aspirante
     *
     * @param string $id    -> Id del aspirante a eliminar
     * @param bool   $purge -> Opción para eliminar fisicamente a un aspirante (por defecto es false)
     *
     * @return bool -> Retorna true si el registro se elimino, de lo contrario retorna false
     */
    public function deleteAspirante(string $id, bool $purge = false): bool
    {
        return $this->where('id_aspirante', $id)->delete(null, $purge);
    }
}
