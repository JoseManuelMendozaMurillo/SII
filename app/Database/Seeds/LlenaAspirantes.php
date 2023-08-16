<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LlenaAspirantes extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        $TiposSangre = 'tipos_sangre';
        $IdTiposSangre = 'id_tipo_sangre';

        $query = $this->db->table($TiposSangre);
        $query->selectMax($IdTiposSangre);
        $result = $query->get()->getRow();
        $MaxTiposSangre = $result->$IdTiposSangre;

        $query = $this->db->table($TiposSangre);
        $query->selectMin($IdTiposSangre);
        $result = $query->get()->getRow();
        $MinTiposSangre = $result->$IdTiposSangre;

        $cohabitantes = 'cohabitantes';
        $id_cohabitante = 'id_cohabitante';

        $query = $this->db->table($cohabitantes);
        $query->selectMax($id_cohabitante);
        $result = $query->get()->getRow();
        $MaxIdCohabitante = $result->$id_cohabitante;

        $query = $this->db->table($cohabitantes);
        $query->selectMin($id_cohabitante);
        $result = $query->get()->getRow();
        $MinidCohabitante = $result->$id_cohabitante;

        $comunidades_indigenas = 'comunidades_indigenas';
        $id_comunidad_indigena = 'id_comunidad_indigena';

        $query = $this->db->table($comunidades_indigenas);
        $query->selectMax($id_comunidad_indigena);
        $result = $query->get()->getRow();
        $MaxIdComunidad = $result->$id_comunidad_indigena;

        $query = $this->db->table($comunidades_indigenas);
        $query->selectMin($id_comunidad_indigena);
        $result = $query->get()->getRow();
        $MinIdComunidad = $result->$id_comunidad_indigena;

        $lenguas_indigenas = 'lenguas_indigenas';
        $id_lengua_indigena = 'id_lengua_indigena';

        $query = $this->db->table($lenguas_indigenas);
        $query->selectMax($id_lengua_indigena);
        $result = $query->get()->getRow();
        $MaxIdLengua = $result->$id_lengua_indigena;

        $query = $this->db->table($lenguas_indigenas);
        $query->selectMin($id_lengua_indigena);
        $result = $query->get()->getRow();
        $MinIdLengua = $result->$id_lengua_indigena;

        $motivos_ingreso = 'motivos_ingreso';
        $id_motivo_ingreso = 'id_motivo_ingreso';

        $query = $this->db->table($motivos_ingreso);
        $query->selectMax($id_motivo_ingreso);
        $result = $query->get()->getRow();
        $MaxIdMotivo = $result->$id_motivo_ingreso;

        $query = $this->db->table($motivos_ingreso);
        $query->selectMin($id_motivo_ingreso);
        $result = $query->get()->getRow();
        $MinidMotivo = $result->$id_motivo_ingreso;

        $nivel_estudios = 'nivel_estudios';
        $id_nivel_estudio = 'id_nivel_estudio';

        $query = $this->db->table($nivel_estudios);
        $query->selectMax($id_nivel_estudio);
        $result = $query->get()->getRow();
        $MaxidNivel = $result->$id_nivel_estudio;

        $query = $this->db->table($nivel_estudios);
        $query->selectMin($id_nivel_estudio);
        $result = $query->get()->getRow();
        $MinIdnivel = $result->$id_nivel_estudio;

        $ocupaciones = 'ocupaciones';
        $id_ocupacion = 'id_ocupacion';

        $query = $this->db->table($ocupaciones);
        $query->selectMax($id_ocupacion);
        $result = $query->get()->getRow();
        $MaxIdOcu = $result->$id_ocupacion;

        $query = $this->db->table($ocupaciones);
        $query->selectMin($id_ocupacion);
        $result = $query->get()->getRow();
        $MinIdOcu = $result->$id_ocupacion;

        $propiedad_vivienda = 'propiedad_vivienda';
        $id_propiedad_vivienda = 'id_propiedad_vivienda';

        $query = $this->db->table($propiedad_vivienda);
        $query->selectMax($id_propiedad_vivienda);
        $result = $query->get()->getRow();
        $MaxIdPropiedad = $result->$id_propiedad_vivienda;

        $query = $this->db->table($propiedad_vivienda);
        $query->selectMin($id_propiedad_vivienda);
        $result = $query->get()->getRow();
        $MinIdPropiedad = $result->$id_propiedad_vivienda;

        $tipos_pisos = 'tipos_pisos';
        $id_tipo_piso = 'id_tipo_piso';

        $query = $this->db->table($tipos_pisos);
        $query->selectMax($id_tipo_piso);
        $result = $query->get()->getRow();
        $MaxIdPiso = $result->$id_tipo_piso;

        $query = $this->db->table($tipos_pisos);
        $query->selectMin($id_tipo_piso);
        $result = $query->get()->getRow();
        $MinIdPiso = $result->$id_tipo_piso;

        $carreras = 'carreras';
        $id_carrera = 'id_carrera';

        $query = $this->db->table($carreras);
        $query->selectMax($id_carrera);
        $result = $query->get()->getRow();
        $MaxIdCarrera = $result->$id_carrera;

        $query = $this->db->table($carreras);
        $query->selectMin($id_carrera);
        $result = $query->get()->getRow();
        $MinIdCarrera = $result->$id_carrera;

        $id_aspirante = 0;
        $user_id = 0;
        $no_solicitud = $faker->numerify('####');
        $nip = $faker->numerify('####');
        $status_pago = $faker->boolean();
        $imagen = '';
        $apellido_paterno = '';
        $apellido_materno = '';
        $nombre = '';
        $fecha_nacimiento = '';
        $genero = '';
        $estado_civil = '';
        $pais_nacimiento = '';
        $telefono = '';
        $email = '';
        $escuela_procedencia = '';
        $estado_escuela = '';
        $municipo_escuela = '';
        $ano_egreso = '';
        $promedio_general = '';
        $carrera_primera_opcion = '';
        $carrera_segunda_opcion = '';
        $turno_preferente = '';
        $ito_primer_opcion = '';
        $motivo_ingreso = '';
        $motivo_seleccion_plan_estudios = '';
        $created_at = '';
        $updated_at = '';
        $deleted_at = '';

        // Genera varios elementos
        for ($i = 0; $i < 5; $i++) {
            echo $faker->name . "\n";
        }
        $users = auth()->getProvider();

        $user = new User([
            'username' => '', // FAKER,
            'email' => '', // FAKER . '@example.com',
            'password' => '1234qwer',
        ]);
        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $insertID = $users->getInsertID();
        $user = $users->findById($insertID);
        $user->addGroup('aspirantes');
    }
}
