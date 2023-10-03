<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test ID</title>
</head>
<body>
<?php helper('form'); ?>
<!-- USED TO SEND id_asignatura ID VIA POST TO SPECIFIED ROUTE -->
    <?php echo form_open('reticulas/' . $route) ?>
    <?php echo form_input('id') ?>
    <?php echo form_submit() ?>
    <?php echo form_close() ?>
    
    
</body>
</html>