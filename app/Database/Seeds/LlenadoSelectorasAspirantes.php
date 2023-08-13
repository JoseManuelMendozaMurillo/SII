<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenadoSelectorasAspirantes extends Seeder
{
    public function run()
    {
        $data = [
            ['tipo' => 'A+'],
            ['tipo' => 'A-'],
            ['tipo' => 'B+'],
            ['tipo' => 'B-'],
            ['tipo' => 'AB+'],
            ['tipo' => 'AB-'],
            ['tipo' => 'O+'],
            ['tipo' => 'O+'],
        ];
        $this->db->table('tipos_sangre')->insertBatch($data);

        $pisos = [
            ['tipo_piso' => 'Tierra'],
            ['tipo_piso' => 'Baldosa'],
            ['tipo_piso' => 'Madera'],
            ['tipo_piso' => 'Ceramica'],
            ['tipo_piso' => 'Marmol o granito'],
            ['tipo_piso' => 'Alfombra'],
            ['tipo_piso' => 'Concreto o cemento pulido'],
            ['tipo_piso' => 'Vinilo'],
            ['tipo_piso' => 'Resina'],
            ['tipo_piso' => 'Otro'],
        ];
        $this->db->table('tipos_piso')->insertBatch($pisos);

        $vivienda = [
            ['propiedad' => 'Casa propia'],
            ['propiedad' => 'Casa alquilada'],
            ['propiedad' => 'Apartamento propio'],
            ['propiedad' => 'Apartamento alquilado'],
            ['propiedad' => 'Casa de familiares'],
            ['propiedad' => 'Casa compartida (roomates)'],
            ['propiedad' => 'Vivienda social/gubernamental'],
            ['propiedad' => 'Habitacion de hotel o pension'],
            ['propiedad' => 'Otra'],
        ];
        $this->db->table('propiedad_vivienda')->insertBatch($vivienda);

        $ocupaciones = [
            ['ocupacion' => 'Estudiante'],
            ['ocupacion' => 'Empleado a tiempo completo'],
            ['ocupacion' => 'Empleado a tiempo parcial'],
            ['ocupacion' => 'Trabajador independiente / Freelancer'],
            ['ocupacion' => 'Empresario / Dueño de negocio'],
            ['ocupacion' => 'Profesional de la salud (Médico, Enfermero, etc.)'],
            ['ocupacion' => 'Profesor / Educador'],
            ['ocupacion' => 'Artista / Creativo'],
            ['ocupacion' => 'Desempleado'],
            ['ocupacion' => 'Jubilado / Pensionado'],
            ['ocupacion' => 'Trabajador manual / Oficios'],
            ['ocupacion' => 'Técnico / Ingeniero'],
            ['ocupacion' => 'Gerente / Directivo'],
            ['ocupacion' => 'Investigador / Científico'],
            ['ocupacion' => 'Estudiante a tiempo parcial / Trabajador estudiantil'],
            ['ocupacion' => 'Agricultor / Agricultora'],
            ['ocupacion' => 'Servicio al cliente / Atención al cliente'],
            ['ocupacion' => 'Diseñador / Diseñadora'],
            ['ocupacion' => 'Obrero / Obrera'],
            ['ocupacion' => 'Funcionario público / Empleado gubernamental'],
        ];
        $this->db->table('ocupaciones')->insertBatch($ocupaciones);

        $cohabitantes = [
            ['cohabitantes' => 'Familiares (Abuelos, tios, etc.)'],
            ['cohabitantes' => 'Padres'],
            ['cohabitantes' => 'Padre'],
            ['cohabitantes' => 'Madre'],
            ['cohabitantes' => 'Hermanos / Hermanas'],
            ['cohabitantes' => 'Primos'],
            ['cohabitantes' => 'Roommates / Compañeros de cuarto'],
            ['cohabitantes' => 'Pareja / Cónyuge'],
            ['cohabitantes' => 'Amigos / Amigas'],
            ['cohabitantes' => 'Solo yo'],
            ['cohabitantes' => 'Mascotas'],
            ['cohabitantes' => 'Parientes'],
            ['cohabitantes' => 'Compañeros de trabajo'],
            ['cohabitantes' => 'Vecinos'],
            ['cohabitantes' => 'Otros cohabitantes'],
        ];
        $this->db->table('cohabitantes')->insertBatch($cohabitantes);

        $nivel = [
            ['nivel' => 'Kinder / Educación Infantil'],
            ['nivel' => 'Primaria / Educación Primaria'],
            ['nivel' => 'Secundaria / Educación Secundaria'],
            ['nivel' => 'Preparatoria / Bachillerato'],
            ['nivel' => 'Educación Técnica / Vocacional'],
            ['nivel' => 'Universidad / Educación Superior'],
            ['nivel' => 'Maestría / Posgrado'],
            ['nivel' => 'Doctorado / Doctorado'],
            ['nivel' => 'Educación Continua / Formación Profesional'],
            ['nivel' => 'Sin educación formal'],
        ];
        $this->db->table('nivel_estudios')->insertBatch($nivel);

        $motivos = [
            ['motivo' => 'Interés en el campo de estudio'],
            ['motivo' => 'Recomendación de amigos o familiares'],
            ['motivo' => 'Oportunidades de crecimiento profesional'],
            ['motivo' => 'Mejorar habilidades y conocimientos'],
            ['motivo' => 'Cumplir con requisitos laborales'],
            ['motivo' => 'Cambio de carrera o enfoque de estudios'],
            ['motivo' => 'Búsqueda de nuevas oportunidades laborales'],
            ['motivo' => 'Interés en la investigación y el aprendizaje'],
            ['motivo' => 'Mejorar el currículum vitae'],
            ['motivo' => 'Obtener un título para aumentar el estatus'],
            ['motivo' => 'Motivos económicos (becas, financiamiento)'],
            ['motivo' => 'Cercanía geográfica a la institución'],
            ['motivo' => 'Desarrollo personal y auto-superación'],
            ['motivo' => 'Ampliar redes de contactos'],
            ['motivo' => 'Cumplir con expectativas familiares'],
            ['motivo' => 'Cumplir con requisitos legales o normativos'],
            ['motivo' => 'Otro'],
        ];
        $this->db->table('motivos_ingreso')->insertBatch($motivos);

        $lenguas = [
            ['lengua' => 'Náhuatl'],
            ['lengua' => 'Huichol'],
            ['lengua' => 'Purépecha'],
            ['lengua' => 'Otomí'],
            ['lengua' => 'Cora'],
            ['lengua' => 'Tepehuano'],
            ['lengua' => 'Zapoteco'],
            ['lengua' => 'Mazahua'],
            ['lengua' => 'Mixteco'],
            ['lengua' => 'Otra'],
        ];
        $this->db->table('lenguas_indigenas')->insertBatch($lenguas);

        $comunidades = [
            ['comunidad' => 'huicholes'],
            ['comunidad' => 'huastecos'],
            ['comunidad' => 'mayas'],
            ['comunidad' => 'mazahuas'],
            ['comunidad' => 'mixtecos'],
            ['comunidad' => 'nahuas'],
            ['comunidad' => 'otomies'],
            ['comunidad' => 'purhépechas'],
            ['comunidad' => 'zapoteco'],
            ['comunidad' => 'triquis'],
        ];
        $this->db->table('comunidades_indigenas')->insertBatch($comunidades);
    }
}
