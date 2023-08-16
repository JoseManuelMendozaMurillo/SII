<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admindex, baby</title>
</head>
<body>
    
    <h1>Meep Meep</h1>
    <div> <?= esc($loggedIn) ?> </div>
    <div> User ID: <?= esc($user) ?> </div>
    <div> Permisos:</div>
    <ul>
        <?php foreach ($permissions as $permission): ?>
            <li><?= $permission ?></li>
        <?php endforeach ?>
    </ul>
    <div> Grupos:</div>
    <ul>
        <?php foreach ($groups as $group): ?>
            <li><?= $group ?></li>
        <?php endforeach ?>
    </ul>
    <h2>Utilidades</h2>
    <div>Usuarios</div>
    <ul>
        <li><a href="<?= base_url('/pruebas/superadmin')?>">Conviertete en superadmin, pa</a></li>
        <!-- <li><a href="<?= base_url('/pruebas/newuser')?>">Crea un nuevo usuario</a></li> -->
        <li>Crea un nuevo usuario yendo a /pruebas/newuser/nombreDelUsurio</li>
        <li>Logeate yendo a /pruebas/login/nombreDelUsurio</li>
        <li>Contrasena default: 1234qwer</li>
        <li>Anadir un usuario loggeado a un grupo: /pruebas/addgrouplogged/nombreDeGrupo</li>
        <li>Anadir usuario especifico a un grupo: /pruebas/addgroup/username/grupo</li>
        <li>Eliminar usuario: /pruebas/deleteuser/nombreDelUsurio</li>
        <li><a href="<?= base_url('pruebas/logout') ?>">Lougout (o yendo a /pruebas/logout)</a></li>
    </ul>
    <h2>Rutas</h2>
    <div>Trabajando en</div>
    <ol>
        <li><a href="<?= base_url('/aspirantes') ?>">Aspirantes</a></li>
        <li><a href="<?= base_url('/pruebas') ?>">Pruebas</a></li>
        <li><a href="<?= base_url('/auth') ?>">Auth</a></li>
        

    </ol>
    <div>Pendientes</div>
    <ul>
    <li><a href="<?= base_url('/financieros') ?>">Financieros</a></li>
        <li><a href="<?= base_url('/des-academico') ?>">Desarrollo academico</a></li>
        <li><a href="<?= base_url('/informacion') ?>">Informacion</a></li>
        <li><a href="<?= base_url('/servicios') ?>">Servicios</a></li>
    </ul>
    
</body>
</html>