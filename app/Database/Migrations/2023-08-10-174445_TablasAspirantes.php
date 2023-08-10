<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class TablasAspirantes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aspirante' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'imagen' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'curp' => [
                'type' => 'VARCHAR',
                'constraint' => 18,
            ],
            'apellido_paterno' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'apellido_materno' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'fecha_nacimiento' => [
                'type' => 'DATETIME',
            ],
            'genero' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'estado_civil' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'pais_nacimiento' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'telefono' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'escuela_procedencia' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'estado_escuela' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'municipio_escuela' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ano_egreso' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'promedio_general' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'carrera_primera_opcion' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'carrera_segunda_opcion' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'turno_preferente' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ito_primer_opcion' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'motivo_ingreso' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'motivo_seleccion_plan_estudios' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deleted_by' => ['type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_aspirante', true);
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->addForeignKey('carrera_primera_opcion', 'carreras', 'id_carrera');
        $this->forge->addForeignKey('carrera_segunda_opcion', 'carreras', 'id_carrera');
        $this->forge->addForeignKey('motivo_ingreso', 'motivos_ingreso', 'id_motivo_ingreso');
        $this->forge->createTable('aspirantes');

        $this->forge->addField([
            'id_aspirante' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'calle_domicilio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_exterior' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'no_interior' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'letra_exterior' => [
                'type' => 'VARCHAR', 'constraint' => 2,
            ],
            'letra_interior' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
            ],
            'colonia' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'estado' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'municipio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'codigo_postal' => [
                'type' => 'VARCHAR',
                'constraint' => 7,
            ],
            'entre_calles' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tutor' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'estado_procedencia' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'comunidad_indigena' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'tipo_sangre' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'discapacidad' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lengua_indigena' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'telefono_contacto' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nivel_estudio_padre' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nivel_estudio_madre' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'vives_actualmente' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'ocupacion_padre' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'ocupacion_madre' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'casa_resides' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'no_cuartos' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'no_miembros' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'no_banos' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'regadera' => [
                'type' => 'boolean',
            ],
            'no_focos' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'tipo_piso' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'no_automoviles' => [
                'type' => 'int',
                'unsigned' => true,
            ],
            'estufa' => [
                'type' => 'boolean',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deleted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255],
        ]);
        $this->forge->addForeignKey('id_aspirante', 'aspirantes', 'id_aspirante');
        $this->forge->addForeignKey('comunidad_indigena', 'comunidades_indigenas', 'id_comunidad_indigena');
        $this->forge->addForeignKey('tipo_sangre', 'tipos_sangre', 'id_tipo_sangre');
        $this->forge->addForeignKey('lengua_indigena', 'lenguas_indigenas', 'id_lengua_indigena');
        $this->forge->addForeignKey('nivel_estudio_padre', 'nivel_estudios', 'id_nivel_estudio');
        $this->forge->addForeignKey('nivel_estudio_madre', 'nivel_estudios', 'id_nivel_estudio');
        $this->forge->addForeignKey('vives_actualmente', 'cohabitantes', 'id_cohabitante');
        $this->forge->addForeignKey('ocupacion_padre', 'ocupaciones', 'id_ocupacion');
        $this->forge->addForeignKey('ocupacion_madre', 'ocupaciones', 'id_ocupacion');
        $this->forge->addForeignKey('casa_resides', 'propiedad_vivienda', 'id_propiedad_vivienda');
        $this->forge->addForeignKey('tipo_piso', 'tipos_piso', 'id_tipo_piso');
        $this->forge->createTable('aspirantes_datos_complementarios');
    }

    public function down()
    {
        $this->forge->dropTable('aspirantes');
        $this->forge->dropTable('aspirantes_datos_complementarios');
    }
}
