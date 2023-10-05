<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva asignatura</title>
</head>
<body>
<?php helper('form'); ?>
<?php echo isset($nombre_asignatura) ? $nombre_asignatura : '' ?>
<?php echo form_open('reticulas/asignatura/save') ?>
<?php
$nombre_asignatura = [
    'name' => 'nombre_asignatura',
    'id' => 'nombre_asignatura',
    'value' => isset($nombre_asignatura) ? $nombre_asignatura : '',
    // 'maxlength' => '100',
    // 'required' => true,
];

$nombre_abreviado_asignatura = [
    'name' => 'nombre_abreviado_asignatura',
    'id' => 'nombre_abreviado_asignatura',
    'value' => isset($nombre_abreviado_asignatura) ? $nombre_abreviado_asignatura : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$id_tipo_asignatura = [
    'name' => 'id_tipo_asignatura',
    'id' => 'id_tipo_asignatura',
    'value' => isset($id_tipo_asignatura) ? $id_tipo_asignatura : '',
    // 'maxlength' => '1',
    // 'required' => true,
];

$id_nivel_escolar = [
    'name' => 'id_nivel_escolar',
    'id' => 'id_nivel_escolar',
    'value' => isset($id_nivel_escolar) ? $id_nivel_escolar : '',
    // 'value' => 'johndoe',
    // 'maxlength' => '1',
    // 'required' => true,
];

$clave_asignatura = [
    'name' => 'clave_asignatura',
    'id' => 'clave_asignatura',
    'value' => isset($clave_asignatura) ? $clave_asignatura : '',
    // 'maxlength' => '1',
    // 'required' => true,
];

$horas_teoricas = [
    'name' => 'horas_teoricas',
    'id' => 'horas_teoricas',
    'value' => isset($horas_teoricas) ? $horas_teoricas : '',
    // 'maxlength' => '2',
    // 'required' => true,
];

$horas_practicas = [
    'name' => 'horas_practicas',
    'id' => 'horas_practicas',
    'value' => isset($horas_practicas) ? $horas_practicas : '',
    // 'maxlength' => '2',
    // 'required' => true,
];

if (isset($id_asignatura)) {
    echo form_hidden('id_asignatura', $id_asignatura);
}

echo form_label('Nombre asignatura', 'nombre_asignatura');
echo form_input($nombre_asignatura);

echo form_label('Nombre asignatura abreviado', 'nombre_abreviado_asignatura');
echo form_input($nombre_abreviado_asignatura);

echo form_label('Tipo asignatura', 'tipo_asignatura');
echo form_input($id_tipo_asignatura);

echo form_label('Nivel escolar', 'id_nivel_escolar');
echo form_input($id_nivel_escolar);

echo form_label('Clave asignatura', 'clave_asignatura');
echo form_input($clave_asignatura);

echo form_label('Horas teoricas', 'horas_teoricas');
echo form_input($horas_teoricas);

echo form_label('Horas practicas', 'horas_practicas');
echo form_input($horas_practicas);

echo form_submit();
?>
<?php echo form_close() ?>


    
</body>
</html>