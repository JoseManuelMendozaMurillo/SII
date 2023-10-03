<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva especialidad</title>
</head>
<body>
<?php helper('form'); ?>
<?php echo isset($nombre_asignatura) ? $nombre_asignatura : '' ?>
<?php echo form_open('reticulas/especialidad/save') ?>
<?php

$id_carrera = [
    'name' => 'id_carrera',
    'id' => 'id_carrera',
    'value' => isset($id_carrera) ? $id_carrera : '',
    'maxlength' => '100',
    'required' => true,
];

$nombre_especialidad = [
    'name' => 'nombre_especialidad',
    'id' => 'nombre_especialidad',
    'value' => isset($nombre_especialidad) ? $nombre_especialidad : '',
    'maxlength' => '100',
    'required' => true,
];

$clave = [
    'name' => 'clave',
    'id' => 'clave',
    'value' => isset($clave) ? $clave : '',
    'maxlength' => '25',
    'required' => true,
];

$clave_oficial = [
    'name' => 'clave_oficial',
    'id' => 'clave_oficial',
    'value' => isset($clave_oficial) ? $clave_oficial : '',
    'maxlength' => '25',
    'required' => true,
];

$creditos_especialidad = [
    'name' => 'creditos_especialidad',
    'id' => 'creditos_especialidad',
    'value' => isset($creditos_especialidad) ? $creditos_especialidad : '',
    'maxlength' => '25',
    'required' => true,
];

$nombre_reducido = [
    'name' => 'nombre_reducido',
    'id' => 'nombre_reducido',
    'value' => isset($nombre_reducido) ? $nombre_reducido : '',
    'maxlength' => '25',
    'required' => true,
];

$siglas = [
    'name' => 'siglas',
    'id' => 'siglas',
    'value' => isset($siglas) ? $siglas : '',
    // 'value' => 'johndoe',
    'maxlength' => '25',
    'required' => true,
];

$fecha_inicio = [
    'name' => 'fecha_inicio',
    'id' => 'fecha_inicio',
    'value' => isset($fecha_inicio) ? $fecha_inicio : '',
    'maxlength' => '25',
    'required' => true,
];

$fecha_termino = [
    'name' => 'fecha_termino',
    'id' => 'fecha_termino',
    'value' => isset($fecha_termino) ? $fecha_termino : '',
    'maxlength' => '25',
    'required' => true,
];

$id_nivel_escolar = [
    'name' => 'id_nivel_escolar',
    'id' => 'id_nivel_escolar',
    'value' => isset($id_nivel_escolar) ? $id_nivel_escolar : '',
    'maxlength' => '25',
    'required' => true,
];

if (isset($id_especialidad)) {
    echo form_hidden('id_especialidad', $id_especialidad);
}

echo form_label('Id carrera', 'id_carrera');
echo form_input($id_carrera);

echo form_label('Nombre especialidad', 'nombre_especialidad');
echo form_input($nombre_especialidad);

echo form_label('Clave', 'clave');
echo form_input($clave);

echo form_label('Clave oficial', 'clave_oficial');
echo form_input($clave_oficial);

echo form_label('Creditos especialidad', 'creditos_especialidad');
echo form_input($creditos_especialidad);

echo form_label('Nombre reducido', 'nombre_reducido');
echo form_input($nombre_reducido);

echo form_label('Siglas', 'siglas');
echo form_input($siglas);

echo form_label('Fecha inicio', 'fecha_inicio');
echo form_input($fecha_inicio);

echo form_label('Fecha termino', 'fecha_termino');
echo form_input($fecha_termino);

echo form_label('Nivel escolar', 'id_nivel_escolar');
echo form_input($id_nivel_escolar);

echo form_submit();
?>
<?php echo form_close() ?>


    
</body>
</html>