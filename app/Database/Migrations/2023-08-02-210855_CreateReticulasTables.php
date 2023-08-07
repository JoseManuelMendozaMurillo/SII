<?php

/**
 * Migracion para las tablas de reticulas
 * En esta migracion se crean todas las tablas para manejar las rituculas
 */

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReticulasTables extends Migration
{
    public function up()
    {
        /* Creamos la tabla nivel_escolar */
        // Campos:
        $fields = [
            'id_nivel_escolar' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'nombre_nivel_escolar' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'default' => null,
            ],
        ];
        $this->forge->addField($fields);

        $this->forge->addPrimaryKey('id_nivel_escolar');

        $this->forge->createTable('nivel_escolar');
        /* Creamos la tabla nivel_escolar */

        /* Creamos la tabla tipo_asignatura */
        // Campos:
        $fields = [
            'id_tipo_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'tipo_asignatura' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addPrimaryKey('id_tipo_asignatura');

        $this->forge->createTable('tipo_asignatura');
        /* Creamos la tabla tipo_asignatura */

        /* Creamos la tabla asignaturas */
        // Campos:
        $fields = [
            'id_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'nombre_asignatura' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nombre_abreviado_asignatura' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'id_tipo_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_nivel_escolar' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'clave_asignatura' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'horas_teoricas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'default' => null,
            ],
            'horas_practicas' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'default' => null,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'deleted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addPrimaryKey('id_asignatura');

        $this->forge->addForeignKey('id_nivel_escolar', 'nivel_escolar', 'id_nivel_escolar');
        $this->forge->addForeignKey('id_tipo_asignatura', 'tipo_asignatura', 'id_tipo_asignatura');

        $this->forge->createTable('asignaturas');
        /* Creamos la tabla asignaturas */

        /* Creamos la tabla dependencia_asignatura */
        // Campos:
        $fields = [
            'id_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_depende_de' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addForeignKey('id_asignatura', 'asignaturas', 'id_asignatura');
        $this->forge->addForeignKey('id_depende_de', 'asignaturas', 'id_asignatura');

        $this->forge->createTable('dependencia_asignatura');
        /* Creamos la tabla dependencia_asignatura */

        /* Creamos la tabla convalidaciones */
        // Campos:
        $fields = [
            'id_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_asignatura_convalidada' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'porcentaje' => [
                'type' => 'DECIMAL',
                'constraint' => '4,2', // 4 dígitos en total, 2 después del punto decimal
                'null' => true,
                'default' => null,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'deleted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addForeignKey('id_asignatura', 'asignaturas', 'id_asignatura');
        $this->forge->addForeignKey('id_asignatura_convalidada', 'asignaturas', 'id_asignatura');

        $this->forge->createTable('convalidaciones');
        /* Creamos la tabla convalidaciones */

        /* Cramos la tabla carreras */
        // Campos:
        $fields = [
            'id_carrera' => [
                'type' => 'INT',
                'contraint' => 10,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'nombre_carrera' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'clave_oficial' => [
                'type' => 'CHAR',
                'constraint' => 13,
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 13,
                'null' => true,
                'default' => null,
            ],
            'siglas' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => true,
                'default' => null,
            ],
            'creditos_totales' => [
                'type' => 'INT',
                'contraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'id_nivel_escolar' => [
                'type' => 'INT',
                'contraint' => 10,
                'unsigned' => true,
                'null' => true,
                'default' => null,
            ],
            'fecha_inicio' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'fecha_termino' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'id_area_carr' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'id_nivel_carr' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'id_sub_area_carr' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'nivel' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'deleted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ];
        $this->forge->addField($fields);

        $this->forge->addPrimaryKey('id_carrera');

        $this->forge->addUniqueKey('clave_oficial');
        $this->forge->addUniqueKey('clave');
        $this->forge->addUniqueKey('siglas');

        $this->forge->addForeignKey('id_nivel_escolar', 'nivel_escolar', 'id_nivel_escolar');

        $this->forge->createTable('carreras');
        /* Cramos la tabla carreras */

        /* Cramos la tabla especialidades */
        // Campos:
        $fields = [
            'id_especialidad' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_carrera' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'nombre_especialidad' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'clave' => [
                'type' => 'VARCHAR',
                'constraint' => 18,
                'null' => true,
                'default' => null,
            ],
            'clave_oficial' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'creditos_especialidad' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'default' => null,
            ],
            'nombre_reducido' => [
                'type' => 'VARCHAR',
                'constraint' => 8,
                'null' => true,
                'default' => null,
            ],
            'siglas' => [
                'type' => 'CHAR',
                'constraint' => 5,
                'null' => true,
                'default' => null,
            ],
            'fecha_inicio' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'fecha_termino' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'id_nivel_escolar' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'deleted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addPrimaryKey('id_especialidad');

        $this->forge->addForeignKey('id_carrera', 'carreras', 'id_carrera');
        $this->forge->addForeignKey('id_nivel_escolar', 'nivel_escolar', 'id_nivel_escolar');

        $this->forge->createTable('especialidades');
        /* Cramos la tabla especialidades */

        /* Creamos la tabla asignaturas_carrera */
        // Campos:
        $fields = [
            'id_carrera' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'semestre_recomendado' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'default' => null,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addForeignKey('id_carrera', 'carreras', 'id_carrera');
        $this->forge->addForeignKey('id_asignatura', 'asignaturas', 'id_asignatura');

        $this->forge->createTable('asignaturas_carrera');
        /* Creamos la tabla asignaturas_carrera */

        /* Creamos la tabla asignaturas_especialidad */
        // Campos:
        $fields = [
            'id_especialidad' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_asignatura' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'semestre_recomendado' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'default' => null,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addForeignKey('id_especialidad', 'especialidades', 'id_especialidad');
        $this->forge->addForeignKey('id_asignatura', 'asignaturas', 'id_asignatura');

        $this->forge->createTable('asignaturas_especialidad');
        /* Creamos la tabla asignaturas_especialidad */

        /* Creamos la tabla reticulas */
        // Campos:
        $fields = [
            'id_reticula' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre_reticula' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'id_carrera' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'id_especialidad' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'created_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'updated_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'deleted_by' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
        ];

        $this->forge->addField($fields);

        $this->forge->addPrimaryKey('id_reticula');

        $this->forge->addForeignKey('id_carrera', 'carreras', 'id_carrera');
        $this->forge->addForeignKey('id_especialidad', 'especialidades', 'id_especialidad');

        $this->forge->createTable('reticulas');
        /* Creamos la tabla reticulas */
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('nivel_escolar');
        $this->forge->dropTable('carreras');
        $this->forge->dropTable('dependencia_asignatura');
        $this->forge->dropTable('tipo_asignatura');
        $this->forge->dropTable('convalidaciones');
        $this->forge->dropTable('especialidades');
        $this->forge->dropTable('asignaturas');
        $this->forge->dropTable('asignaturas_especialidad');
        $this->forge->dropTable('asignaturas_carrera');
        $this->forge->dropTable('reticulas');

        $this->db->enableForeignKeyChecks();
    }
}
