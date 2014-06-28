<?php
    include '../clases/ConexionTIS.php';
    $conex = new ConexionTIS();

$nombre=$_POST['nombreconv'];
$fecha=$_POST['fecha'];
    $fechaActual= $conex->getFechaActual();
    //echo 'la fecha actual es:'.$fechaActual[0].'<br>';
    $fechaInsert = date("Y-m-d", strtotime($fecha));
    $nvoNomb = trim($nombre);
    if ($nvoNomb == '') {
        echo "<div class='alert alert-danger col-lg-8'>
                 El nombre de la convocatoria no puede ser nulo !!!
              </div>";
    }
    else {
        if ($fechaInsert == '' || $fechaInsert < $fechaActual[0]) {
        echo "<div class='alert alert-danger col-lg-8'>
                 la fecha de la convocatoria no puede ser nula o menor a la actual...
              </div>";
        }
        else {
            $conex->insertarConvocatoria($nombre, $fechaInsert);
            echo "<div class='alert alert-success col-lg-8'>
                    Convocatoria creada...<br>
                    <b>Actualizar para ver cambios...</b>
                  </div>";
        }
    }

?>
