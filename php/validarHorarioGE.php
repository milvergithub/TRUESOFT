<?php
session_start();
include '../clases/ConexionTIS.php';
$codigoDoc=$_POST['grupoDoc'];
$codigoDia=$_POST['dia'];
$codigoHora=$_POST['horario'];
$conexionHorarioElegir=new ConexionTIS();
$conexionHorarioElegir->guardarHorarioElegido($codigoDoc, $codigoDia, $codigoHora, $_SESSION['coduser']);
echo '<div class="alert alert-success">
         Hora de presentacion elegida<br/>
         configuracion guardada
      </div>';
?>
