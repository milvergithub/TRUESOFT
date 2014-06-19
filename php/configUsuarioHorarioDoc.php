<?php
include '../clases/ConexionTIS.php';
$conexionConfig=new ConexionTIS();
    $hora = $_POST['hora'];
    $codhora = $_POST['codhora'];
    $dia = $_POST['dia'];
    $sql="update horario set hora_hora='".$hora."' ,dia_hora='".$dia."' where cod_hora='".$codhora."'";
    $conexionConfig->Insertar($sql);
    
    echo '<script type="text/javascript">
            window.location="../index.php?configuracionadminhoradocente";
          </script>';
    
?>