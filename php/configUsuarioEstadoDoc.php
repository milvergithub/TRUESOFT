<?php
include '../clases/ConexionTIS.php';
$conexionConfig=new ConexionTIS();
    $esta = $_POST['estado'];
    $nombDoc=$_POST['cuenta'];
    if ($esta=='habilitado') {
        $esta='FALSE';
        $sql="update usuario set estado_usuario='".$esta."'where cuenta_usuario='".$nombDoc."'";
        $conexionConfig->Insertar($sql);
    }  else {
        $esta='TRUE';
        $sql="update usuario set estado_usuario='".$esta."'where cuenta_usuario='".$nombDoc."'";
        $conexionConfig->Insertar($sql);
    }
    echo '<script type="text/javascript">
            window.location="../index.php?configuracionadminestadodoc";
          </script>';
?>
