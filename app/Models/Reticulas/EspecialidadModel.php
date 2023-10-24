<?php

namespace App\Models\Reticulas;

// Especialidad Model

use CodeIgniter\Model;
use Exception;

class EspecialidadModel extends Model
{
    // members
    protected $carreraModel;
    protected $asignaturasModel;
    protected $asignaturasEspecialidadModel;
    protected $estatusModel;

    // db
    protected $table = 'especialidades';
    protected $primaryKey = 'id_especialidad';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id_carrera',                   // Uses ID, CarrerasModel needed
        'nombre_especialidad',
        'clave_especialidad',
        'fecha_inicio',
        'id_nivel_escolar',
        'estatus',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // entity
    protected $returnType = \App\Entities\Reticulas\Especialidad::class;

    protected function initialize()
    {
        $this->carreraModel = new CarreraModel();
        $this->asignaturasModel = new AsignaturaModel();
        $this->asignaturasEspecialidadModel = new AsignaturaEspecialidadModel();
        $this->estatusModel = new EstatusModel();
    }

    public function getAsArray()
    {
        $data = $this->find();

        $array = [];
        foreach ($data as $obj) {
            array_push($array, $obj->toArray());
        }

        return $array;
    }

    /**
     * Función para obtener las especialidades que no pertencen a una reticula
     *
     * @param id_carrera Id de la carrera a obtener sus especialdades
     */
    public function getWithoutReticula($id_carrera)
    {
        // Construimos la consulta
        $builder = $this->db->table('especialidades as esp')
                        ->select('esp.id_especialidad, 
                                  esp.id_carrera, 
                                  esp.nombre_especialidad,
                                  esp.clave_especialidad,
                                  fecha_inicio, 
                                  esp.estatus')
                        ->join('reticulas as ret', 'esp.id_carrera = ret.id_carrera')
                        ->where('esp.id_especialidad <> ret.id_especialidad')
                        ->where('esp.id_carrera', $id_carrera);
        // Ejecuta la consulta y obtén los resultados
        $query = $builder->get();
        $results = $query->getResult();

        return $results;
    }

    /**
     * Función para cambiar el estatus de una especialidad
     *
     * @param string|int id_especialidad Id de la especialidad a cambiar
     * @param string estado - Nuevo estatus de la especialidad
     *
     * @return bool True -> Se cambios el estado, False -> No se cambio el estado
     */
    public function changeStatus($id_especialidad, $estado)
    {
        $this->db->transStart();

        try {
            // Obtenemos el id del nuevo estatus
            $idStatus = $this->estatusModel->getIdByEstatus($estado);
            if ($idStatus === null) {
                throw new Exception('El estado no existe en la Base de Datos', 500);
            }

            // Actualizamos el estatus de la especialidad
            $isUpdated = $this->update($id_especialidad, ['estatus' => $idStatus]);
            if (!$isUpdated) {
                throw new Exception('Hubo un error al intenta actualizar el estatus de la especialidad', 500);
            }

            // Actualizamos el estatus de las materias de la especialidad
            $asignaturasEspcialidad = $this->asignaturasEspecialidadModel->getByIdEspecialidad($id_especialidad);
            for ($i = 0; $i < count($asignaturasEspcialidad); $i++) {
                $isUpdated = $this->asignaturasModel->update($asignaturasEspcialidad[$i]->id_asignatura, ['estatus' => $idStatus]);
                if (!$isUpdated) {
                    throw new Exception('Error al actualizar el estatus de una materia de la especialidad', 500);

                    break;
                }
            }

            $this->db->transCommit();

            return true;
        } catch (Exception $e) {
            $this->db->transRollback();
            log_message('error', $e->getMessage());

            return false;
        }
    }

    /**
      * delete
      * Función para eliminar una especialidad y sus asignaturas
      *
       * @param ?string $id    Id de la especialidad a eliminar
       * @param bool    $purge Opción para eliminar fisicamente una especialidad (por defecto es false)
       *
       * @return bool True -> Se elimino la especialidad, False -> No se elimino la especialidad
      */
    public function delete($id = null, bool $purge = false): bool
    {
        $this->db->transStart();

        try {
            if ($id === null) {
                $this->db->transCommit();

                return true;
            }

            // Eliminamos la especialidad
            $isDeleted = $this->parent::delete($id, $purge);
            if (!$isDeleted) {
                throw new Exception('No se puedo eliminar la especialidad', 500);
            }

            // Eliminamos las asignaturas
            $asignaturasEspcialidad = $this->asignaturasEspecialidadModel->getByIdEspecialidad($id);
            foreach ($asignaturasEspcialidad as $idAsignatura) {
                $isDeleted = $this->asignaturasModel->delete($idAsignatura, $purge);
                if (!$isDeleted) {
                    throw new Exception('Error al eliminar una asignatura de la especialidad', 500);

                    break;
                }
            }

            // Eliminamos la relacion de las asignaturas con la especialidad
            $this->asignaturasEspecialidadModel->where('id_especialidad', $id)->delete(null, $purge);

            $this->db->transCommit();

            return true;
        } catch (Exception $e) {
            $this->db->transRollback();

            return false;
        }
    }
}
