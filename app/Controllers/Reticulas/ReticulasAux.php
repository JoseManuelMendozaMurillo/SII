<?php

namespace App\Controllers\Reticulas;

use App\Models\Reticulas\AsignaturaModel;
use App\Models\Reticulas\CarreraModel;
use App\Models\Reticulas\EspecialidadModel;
use App\OperationValidators\Reticulas\EspecualidadValidator;
use Exception;

class ReticulasAux
{
    protected function reticulaJSONLoop()
    {
        $num = 1;
        $semestre = 'semestre' . $num;

        $semestresData = [];
        // Da de alta las materias
        while (isset($reticulaData->$semestre)) {
            $data[$semestre] = [];
            $data[$semestre]['materias'] = [];
            $data[$semestre]['totalCreditos'] = 0;

            foreach ($reticulaData->$semestre as $asignaturaClave) {
                $asignatura = $this->asignaturaModel->where('clave_asignatura', $asignaturaClave)->find()[0];

                $asignaturadata = [];
                $asignaturadata['name'] = $asignatura->nombre_asignatura;

                $asignaturadata['horasTeoricas'] = $asignatura->horas_teoricas;
                $asignaturadata['horasPracticas'] = $asignatura->horas_practicas;
                $creditosTotalesAsignatura = (int) $asignatura->horas_teoricas + (int) $asignatura->horas_practicas;
                $asignaturadata['totalCreditos'] = $creditosTotalesAsignatura;
                $data['creditosTotales'] += $creditosTotalesAsignatura;

                $data[$semestre]['materias'][$asignatura->clave_asignatura] = $asignaturadata;
                $data[$semestre]['totalCreditos'] += $creditosTotalesAsignatura;
            }
            $num++;
            $semestre = 'semestre' . $num;
        }
    }
}
