<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Formulario de alumnos</title>
</head>
<body>
    <div class="container-fluid bg-dark vh-100">
        <div class="container d-flex flex-column justify-content-center align-items-center gap-3 text-white">
            <h1 class="mt-3"><?= isset($alumno) ? "Actualizar" : "Agregar" ?> alumno</h1>
            <div class="w-auto align-self-start">
                <a href="<?= base_url(); ?>" class="btn btn-info d-flex justify-content-center align-items-center gap-2 me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                    <span class="text-white">Volver</span>
                </a>
            </div>

            <!-- Errores -->
            <div class="
                    w-100 
                    <?= session("errors") != null ? "d-block" : "d-none"; ?>
                  " 
                  id="alertSuccess">
                <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
                <?= session("errors") != null ? session("errors")[array_key_first(session("errors"))] : ""; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
            <!-- Errores -->

            <form action="<?php 
                if(isset($alumno)){
                    echo base_url("alumno/update/").$alumno->id_alumno;
                }else if(old("id") != ""){
                    echo base_url("alumno/update/").old("id");
                }else{
                    echo base_url("alumno/add");
                }
                ?>" id="formAddAlumno" class="row mt-2" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id" value="<?= isset($alumno) ? $alumno->id_alumno : (old("id") != "" ? old("id") : ""); ?>">
                <div class="row">
                    <div class="col-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" required class="form-control" id="name" name="name" 
                               value="<?= isset($alumno) ? $alumno->nombre : old("name"); ?>">
                    </div>
                    <div class="col-6">
                        <label for="numControl" class="form-label">Número de control</label>
                        <input type="text" required class="form-control" id="numControl" name="numControl" value="<?= isset($alumno) ? $alumno->num_control : old("numControl"); ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <label for="selectCarrera" class="form-label">Carrera</label>
                        <select id="selectCarrera" name="selectCarrera" class="form-select" aria-label="Default select example" required>
                            <option <?= isset($alumno) ? "" : "selected"; ?> disabled value="">Elige una carrera</option>
                            <?php
                                foreach($carreras as $carrera){
                                    if(isset($alumno) && $carrera->id_carrera == $alumno->id_carrera 
                                        || $carrera->id_carrera == old("selectCarrera")){
                                        echo "<option selected value=".$carrera->id_carrera.">$carrera->carrera</option>"; 
                                        continue;
                                    }
                                    echo "<option value=".$carrera->id_carrera.">$carrera->carrera</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-6">
                    <label for="selectSemestre" class="form-label">Semestre</label>
                        <select id="selectSemestre" name="selectSemestre" class="form-select" aria-label="Default select example" required>
                            <option <?= isset($alumno) ? "" : "selected"; ?> disabled value="">Elige un Semestre</option>
                            <?php
                                for($i = 2; $i <= 8; $i += 2) {
                                    if(isset($alumno) && $alumno->semestre == $i || $i == old("selectSemestre")){
                                        echo "<option selected value=".$i.">$i</option>"; 
                                        continue;
                                    }
                                    echo "<option value=".$i.">$i</option>";
                                }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                    <label for="selectGrupo" class="form-label">Grupo</label>
                        <select id="selectGrupo" name="selectGrupo" class="form-select" aria-label="Default select example" required>
                            <option <?= isset($alumno) ? "" : "selected"; ?> disabled value="">Selecciona carrera y semestre</option>
                            <?php
                                if( isset($alumno) ){
                                    foreach($grupos as $grupo){
                                        if($grupo->id_grupo == old("selectGrupo") || $grupo->id_grupo == $alumno->id_grupo){
                                            echo "<option selected value=".$grupo->id_grupo.">$grupo->identificador</option>"; 
                                            continue;
                                        }
                                        echo "<option value=".$grupo->id_grupo.">$grupo->identificador</option>";
                                    }
                                }else if( old("selectSemestre") != null && old("selectCarrera") != null ){
                                    $grupos = session("grupos");
                                    foreach($grupos as $grupo){
                                        if($grupo->id_grupo == old("selectGrupo")){
                                            echo "<option selected value=".$grupo->id_grupo.">$grupo->identificador</option>"; 
                                            continue;
                                        }
                                        echo "<option value=".$grupo->id_grupo.">$grupo->identificador</option>";
                                    }
                                }
                        
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row-cols-6 mt-4 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center gap-1 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                        </svg>
                        <?= isset($alumno) ? "Actualizar" : "Agregar" ?> alumno
                  </button>
                </div>
              </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script type="text/javascript">
        const url = "<?= base_url(); ?>"
    </script>
    <script src="<?= base_url("Js/Alumno/form.js"); ?>"></script>
</body>
</html>