<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Carrera</title>
</head>
<body>
<?php helper('form'); ?>
<?php echo isset($nombre_asignatura) ? $nombre_asignatura : '' ?>
<?php echo form_open('reticulas/carrera/save') ?>
<?php

$nombre_carrera = [
    'name' => 'nombre_carrera',
    'id' => 'nombre_carrera',
    'value' => isset($nombre_carrera) ? $nombre_carrera : '',
    // 'maxlength' => '100',
    // 'required' => true,
];

$clave_oficial = [
    'name' => 'clave_oficial',
    'id' => 'clave_oficial',
    'value' => isset($clave_oficial) ? $clave_oficial : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$clave = [
    'name' => 'clave',
    'id' => 'clave',
    'value' => isset($clave) ? $clave : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$siglas = [
    'name' => 'siglas',
    'id' => 'siglas',
    'value' => isset($siglas) ? $siglas : '',
    // 'value' => 'johndoe',
    // 'maxlength' => '25',
    // 'required' => true,
];

$creditos_totales = [
    'name' => 'creditos_totales',
    'id' => 'creditos_totales',
    'value' => isset($creditos_totales) ? $creditos_totales : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$id_nivel_escolar = [
    'name' => 'id_nivel_escolar',
    'id' => 'id_nivel_escolar',
    'value' => isset($id_nivel_escolar) ? $id_nivel_escolar : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$fecha_inicio = [
    'name' => 'fecha_inicio',
    'id' => 'fecha_inicio',
    'value' => isset($fecha_inicio) ? $fecha_inicio : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$fecha_termino = [
    'name' => 'fecha_termino',
    'id' => 'fecha_termino',
    'value' => isset($fecha_termino) ? $fecha_termino : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$id_area_carr = [
    'name' => 'id_area_carr',
    'id' => 'id_area_carr',
    'value' => isset($id_area_carr) ? $id_area_carr : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$id_nivel_carr = [
    'name' => 'id_nivel_carr',
    'id' => 'id_nivel_carr',
    'value' => isset($id_nivel_carr) ? $id_nivel_carr : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$id_sub_area_carr = [
    'name' => 'id_sub_area_carr',
    'id' => 'id_sub_area_carr',
    'value' => isset($id_sub_area_carr) ? $id_sub_area_carr : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

$nivel = [
    'name' => 'nivel',
    'id' => 'nivel',
    'value' => isset($nivel) ? $nivel : '',
    // 'maxlength' => '25',
    // 'required' => true,
];

if (isset($id_carrera)) {
    echo form_hidden('id_carrera', $id_carrera);
}

echo form_label('Nombre carrera', 'nombre_carrera');
echo form_input($nombre_carrera);

echo form_label('Clave oficial', 'clave_oficial');
echo form_input($clave_oficial);

echo form_label('Clave', 'tipo_asignatura');
echo form_input($clave);

echo form_label('Siglas', 'siglas');
echo form_input($siglas);

echo form_label('Creditos totales', 'creditos_totales');
echo form_input($creditos_totales);

echo form_label('Id nivel escolar', 'id_nivel_escolar');
echo form_input($id_nivel_escolar);

echo form_label('Fecha inicio', 'fecha_inicio');
echo form_input($fecha_inicio);

echo form_label('Fecha termino', 'fecha_termino');
echo form_input($fecha_termino);

echo form_label('Id area carrera', 'id_area_carr');
echo form_input($id_area_carr);

echo form_label('Id nivel carrera', 'id_nivel_carr');
echo form_input($id_nivel_carr);

echo form_label('Id sub area carrera', 'id_sub_area_carr');
echo form_input($id_sub_area_carr);

echo form_label('Nivel', 'nivel');
echo form_input($nivel);

echo form_submit();
?>
<?php echo form_close() ?>


    
</body>
</html>