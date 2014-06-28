<?php
include '../clases/ConexionTIS.php';
$conexionConfig=new ConexionTIS();
    $hora = $_POST['hora'];
    $codhora = $_POST['codhora'];
    $dia = $_POST['dia'];
    $grupo=$_POST['grupo'];
    $conexionConfig->saveUpdateHorarioDiaHora($hora, $dia, $codhora,$grupo);
    
    echo '<script type="text/javascript">
            window.location="../index.php?configuracionadminhoradocente";
          </script>';
     
    
?>