<?php
include '../clases/ConexionTIS.php';
$conexionUFL=new ConexionTIS();
$fechaNueva=date("Y-m-d", strtotime($_POST['fechaNN']));
if ($fechaNueva<$_POST['fechaA']) {
   echo '<div class="alert alert-danger">
            Para modificar la fecha ingrese una fecha posterior a la actual <strong>'.$_POST['fechaA'].'</strong>
         </div>';
}
else{
   $conexionUFL->updateFechaLimiteEntregaDocm($fechaNueva, $_POST['codgrupo'], $_POST['codconv']);
   echo '<div class="alert alert-success">
            Fecha modificada la nueva fecha limite de presentacion de propuestas es  <strong>'.$fechaNueva.'</strong>
         </div>';
}
?>
