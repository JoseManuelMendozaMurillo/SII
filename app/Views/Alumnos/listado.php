<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Listado de alumnos</title>
</head>
<body class="vh-100 bg-dark">
    <div class="container-fluid text-white">
        <div class="container d-flex flex-column align-items-center gap-3">
            <h1 class="mt-3">Listado de alumnos</h1>
            
            <div class="
                    w-100 
                    <?php echo $alert ? "d-block" : "d-none"; ?>
                  " 
                  id="alertSuccess">
                <div class="alert alert-<?= $typeAlert; ?> d-flex justify-content-between align-items-center" role="alert">
                <?= $textAlert; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>

            <div class="w-100 d-flex justify-content-end">
                <a href="<?= base_url("alumno/form" ); ?>"
                  class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center p-3 me-4">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                  </svg>
                </a>
            </div>

            <table class="table text-white">
                <thead>
                  <tr class="text-center">
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Número de control</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  foreach($alumnos as $alumno){
                    echo "<tr class='text-center'>";
                    echo  "<td class='align-middle' scope='row'>$alumno->id</td>";
                    echo  "<td class='align-middle' id='nameAlumno".$alumno->id."'>$alumno->nombre</td>";
                    echo  "<td class='align-middle'>$alumno->num_control</td>";
                    echo  "<td class='align-middle'>$alumno->carrera</td>";
                    echo  "<td class='align-middle'>$alumno->semestre</td>";
                    echo  "<td class='align-middle'>$alumno->grupo</td>";
                    $url_update = base_url('alumno/form/') . $alumno->id;
                    echo <<<HTML
                      <td>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                          <a class="btn btn-outline-info d-flex justify-content-center align-items-center rounded-circle p-3" 
                            href="{$url_update}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16">
                              <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                            </svg>
                          </a>
                          <button type="button" data-id="{$alumno->id}" class="btn btn-outline-danger d-flex justify-content-center align-items-center rounded-circle p-3 btnOpenModalDelete">
                            <svg data-id="{$alumno->id}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16">
                              <path data-id="{$alumno->id}" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                          </button>
                        </div>
                      </td>
                    HTML;
                    echo "</tr>";
                  }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
  <!-- Modal para eliminar -->
  <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <div class="modal-title d-flex justify-content-center align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
            <h1 class="d-block text-white mt-1 fs-4" id="titleModal">Eliminar</h1>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-white text-center">
          <h2 class="fs-5 fw-bolder">¿Seguro que deseas eliminar este alumno?</h2>
          <p class="">Esta acción no se puede revertir</p>
          <p>
            <span class="fw-semibold">Alumno:</span>  
            <span id="nameAlumno">...</span>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info d-flex justify-content-center align-items-center gap-1" data-bs-dismiss="modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
            <span class="text-white" >Cancelar</span> 
          </button>
          <a type="button" href="#" id="btnDeleteAlumno" class="btn btn-danger d-flex justify-content-center align-items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" viewBox="0 0 16 16">
              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
            <span class="text-white">Eliminar</span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script type="text/javascript">
    const url = "<?= base_url(); ?>";
  </script>
  <script src="<?= base_url("Js/Alumno/listado.js");?>"></script>
</body>
</html>