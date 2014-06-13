<?php
session_start();
include '../clases/config.php';
$configuracion=new config();
$codigoGrupo=$configuracion->dameCodigoGrupoDocente($_SESSION['coduser']);
$conexionNP=new ConexionTIS();
$conexionNP->guardarNumeroPresentaciones($codigoGrupo, $_POST['cantidad']);
echo '<div class="alert alert-success">
         el numero de ingresado fue '.$_POST['cantidad'].'
      </div>'
?>
