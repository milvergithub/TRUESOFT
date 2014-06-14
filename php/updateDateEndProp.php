<?php
include '../clases/ConexionTIS.php';
$conexionUFL=new ConexionTIS();
$fechaNueva=date("Y-m-d", strtotime($_POST['fechaNueva']));
if ($fechaNueva<$_POST['fechaactual']) {
   echo '<div class="alert alert-danger">
            Para modificar la fecha ingrese una fecha posterior a la actual <strong>'.$_POST['fechaactual'].'</strong>
         </div>';
}
else{
   $conexionUFL->updateFechaLimiteEntregaProp($fechaNueva, $_POST['codgrupo'], $_POST['codigoconv']);
   echo '<div class="alert alert-success">
            Fecha modificada la nueva fecha limite de presentacion de propuestas es  <strong>'.$fechaNueva.'</strong>
         </div>';
}
?>

