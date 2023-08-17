<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;

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

        $tipos_pisos = 'tipos_piso';
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

        $estado_civil = 'estado_civil';
        $id_estado_civil = 'id_estado_civil';

        $query = $this->db->table($estado_civil);
        $query->selectMax($id_estado_civil);
        $result = $query->get()->getRow();
        $MaxIdEstado = $result->$id_estado_civil;

        $query = $this->db->table($estado_civil);
        $query->selectMin($id_estado_civil);
        $result = $query->get()->getRow();
        $MinIdEstado = $result->$id_estado_civil;

        // Genera varios elementos
        for ($i = 0; $i < 200; $i++) {
            $id_aspirante = 0;
            $no_solicitud = $faker->numerify('####');
            $nip = $faker->numerify('####');
            $estatus_pago = $faker->boolean();
            $imagen = '';
            $apellido_paterno = $faker->lastName();
            $apellido_materno = $faker->lastName();
            $nombre = $faker->firstName();
            //echo $apellido_paterno . ' ' . $apellido_materno . ' ' . $nombre . "\n";
            $fecha_nacimiento = $faker->date() . ' ' . $faker->time();
            //echo $fecha_nacimiento . "\n";
            $genero = $faker->randomElements(['H', 'M'], 1);
            $estado_civil = $faker->numberBetween($MinIdEstado, $MaxIdEstado);
            $pais_nacimiento = 'Mexico';
            $telefono = str_replace('-', '', $faker->phoneNumber());
            $email = $faker->email();
            $escuela_procedencia = 'CBTIS 49';
            $estado_escuela = 'JALISCO';
            $municipo_escuela = 'OCOTLAN';
            $ano_egreso = '2023';
            $promedio_general = '96';
            $carrera_primera_opcion = $faker->numberBetween($MinIdCarrera, $MaxIdCarrera);
            $carrera_segunda_opcion = $faker->numberBetween($MinIdCarrera, $MaxIdCarrera);
            $turno_preferente = 'Cualquiera';
            $ito_primer_opcion = 'SI';
            $motivo_ingreso = $faker->numberBetween($MinidMotivo, $MaxIdMotivo);
            $motivo_seleccion_plan_estudios = 'Me gusto';
            $curp = $this->generarCURP($apellido_paterno, $apellido_materno, $nombre, str_replace('-', '', substr($fecha_nacimiento, 0, 10)), reset($genero), 'JC');
            //echo 'CURP generada: ' . $curp . "\n";

            $users = auth()->getProvider();

            $user = new User([
                'username' => $curp, // FAKER,
                'email' => $email, // FAKER . '@example.com',
                'password' => '1234qwer',
            ]);
            $users->save($user);

            // To get the complete user object with ID, we need to get from the database
            $insertID = $users->getInsertID();
            $user = $users->findById($insertID);
            $user->addGroup('aspirante');

            $query = $this->db->table('users');
            $query->select('id');
            $result = $query->getWhere(['username' => $curp])->getRow();
            $UserId = $result->id;
            //echo $UserId;
            $data = [
                'id_aspirante' => $id_aspirante,
                'user_id' => $UserId,
                'no_solicitud' => $no_solicitud,
                'nip' => $nip,
                'estatus_pago' => $estatus_pago,
                'imagen' => $imagen,
                'curp' => $curp,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'nombre' => $nombre,
                'fecha_nacimiento' => $fecha_nacimiento,
                'genero' => $genero,
                'estado_civil' => $estado_civil,
                'pais_nacimiento' => $pais_nacimiento,
                'telefono' => $telefono,
                'email' => $email,
                'escuela_procedencia' => $escuela_procedencia,
                'estado_escuela' => $estado_escuela,
                'municipio_escuela' => $municipo_escuela,
                'ano_egreso' => $ano_egreso,
                'promedio_general' => $promedio_general,
                'carrera_primera_opcion' => $carrera_primera_opcion,
                'carrera_segunda_opcion' => $carrera_segunda_opcion,
                'turno_preferente' => $turno_preferente,
                'ito_primer_opcion' => $ito_primer_opcion,
                'motivo_ingreso' => $motivo_ingreso,
                'motivo_seleccion_plan_estudios' => $motivo_ingreso,
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
                'created_by' => 'mike',
                'updated_by' => null,
                'deleted_by' => null,
            ];

            // Using Query Builder
            $this->db->table('aspirantes')->insert($data);

            $query = $this->db->table('aspirantes');
            $query->select('id_aspirante');
            $result = $query->getWhere(['curp' => $curp])->getRow();
            $Id_Comp = $result->id_aspirante;

            $data = [
                'id_aspirante' => $Id_Comp,
                'calle_domicilio' => $faker->streetName(),
                'no_exterior' => $faker->numberBetween(0, 150),
                'no_interior' => $faker->numberBetween(0, 10),
                'letra_exterior' => $faker->randomLetter(),
                'letra_interior' => $faker->randomLetter(),
                'colonia' => $faker->cityPrefix(),
                'estado' => $faker->state(),
                'municipio' => $faker->city(),
                'codigo_postal' => $faker->postcode(),
                'entre_calles' => $faker->streetName() . ' & ' . $faker->streetName(),
                'tutor' => $faker->name(),
                'estado_procedencia' => $faker->state(),
                'comunidad_indigena' => $faker->numberBetween($MinIdComunidad, $MaxIdComunidad),
                'tipo_sangre' => $faker->numberBetween($MaxTiposSangre, $MinTiposSangre),
                'discapacidad' => 'NO',
                'lengua_indigena' => $faker->numberBetween($MaxIdLengua, $MinIdLengua),
                'telefono_contacto' => str_replace('-', '', $faker->phoneNumber()),
                'nivel_estudio_padre' => $faker->numberBetween($MaxidNivel, $MinIdnivel),
                'nivel_estudio_madre' => $faker->numberBetween($MaxidNivel, $MinIdnivel),
                'vives_actualmente' => $faker->numberBetween($MaxIdCohabitante, $MinidCohabitante),
                'ocupacion_padre' => $faker->numberBetween($MaxIdOcu, $MinIdOcu),
                'ocupacion_madre' => $faker->numberBetween($MaxIdOcu, $MinIdOcu),
                'casa_resides' => $faker->numberBetween($MaxIdPropiedad, $MinIdPropiedad),
                'no_cuartos' => $faker->numberBetween(0, 10),
                'no_miembros' => $faker->numberBetween(0, 30),
                'no_banos' => $faker->numberBetween(0, 10),
                'regadera' => $faker->boolean(),
                'no_focos' => $faker->numberBetween(1, 20),
                'tipo_piso' => $faker->numberBetween($MaxIdPiso, $MinIdPiso),
                'no_automoviles' => $faker->numberBetween(1, 5),
                'estufa' => $faker->boolean(),
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
                'created_by' => 'mike',
                'updated_by' => null,
                'deleted_by' => null,
            ];
            $this->db->table('aspirantes_datos_complementarios')->insert($data);
        }
    }

    public static function generarCURP($apellidoPaterno, $apellidoMaterno, $nombre, $fechaNacimiento, $genero, $estadoNacimiento)
    {
        $faker = \Faker\Factory::create();

        $apellidoPaterno = strtoupper($apellidoPaterno);
        $apellidoMaterno = strtoupper($apellidoMaterno);
        $nombre = strtoupper($nombre);
        $genero = $genero;
        $estadoNacimiento = strtoupper($estadoNacimiento);
        $consonantes = 'BCDFGHJKLMNPQRSTVWXYZ';
        $vocales = 'AEIOU';
        // Obtener la primera letra del apellido paterno
        $primerLetraPaterno = $apellidoPaterno[0];
        // Obtener la primera vocal del apellido paterno
        $primerVocalPaterno = '';
        for ($i = 1; $i < strlen($apellidoPaterno); $i++) {
            if (strpos($vocales, $apellidoPaterno[$i]) !== false) {
                $primerVocalPaterno = $apellidoPaterno[$i];
                //echo $apellidoPaterno[$i];

                break;
            }
        }
        // Obtener la primera letra del apellido materno
        $primerLetraMaterno = $apellidoMaterno[0];

        // Obtener la primera letra del nombre
        $primerLetraNombre = $nombre[0];

        $fechaCURP = substr($fechaNacimiento, 2, 10);

        // Obtener la primera consonante interna del primer apellido
        $primeraConsonanteInterna = '';
        for ($i = 1; $i < strlen($apellidoPaterno); $i++) {
            if (strpos($consonantes, $apellidoPaterno[$i]) !== false) {
                $primeraConsonanteInterna = $apellidoPaterno[$i];

                break;
            }
        }

        // Obtener la primera consonante interna del segundo apellido
        $primeraConsonanteMaterno = '';
        for ($i = 1; $i < strlen($apellidoMaterno); $i++) {
            if (strpos($consonantes, $apellidoMaterno[$i]) !== false) {
                $primeraConsonanteMaterno = $apellidoMaterno[$i];

                break;
            }
        }

        // Generar los dos dígitos aleatorios
        $digitosAleatorios = strtoupper($faker->randomLetter()) . strtoupper($faker->randomLetter()) . $faker->randomDigit();
        /*echo '60' . $primerLetraPaterno;
        echo '61' . $primerVocalPaterno;
        echo '62' . $primerLetraMaterno;
        echo '63' . $primerLetraNombre;
        echo '64' . $fechaCURP;
        echo '65' . $genero;
        echo '66' . $estadoNacimiento;
        echo '67' . $primeraConsonanteInterna;
        echo '68' . $primeraConsonanteMaterno;
        echo '69' . $digitosAleatorios;*/
        // Formar la clave completa
        $curp = $primerLetraPaterno . $primerVocalPaterno . $primerLetraMaterno . $primerLetraNombre . $fechaCURP . $genero . $estadoNacimiento . $primeraConsonanteInterna . $primeraConsonanteMaterno . $digitosAleatorios;
        //echo strlen($curp) . "\n";

        return $curp;
    }

    // Ejemplo de uso
}
