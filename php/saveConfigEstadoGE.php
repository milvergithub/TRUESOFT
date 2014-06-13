<?php
include '../clases/ConexionTIS.php';
$conexionSaveSeting=new ConexionTIS();
$estado=$_GET['estado'];

echo "codContrato=".$_GET['codContrato']."<br>";
echo "estado=".$estado;
$conexionSaveSeting->guardarConfiguracionEstadoGE($_GET['codContrato'],$estado);
echo '<script type="text/javascript">
         window.location="../index.php?configuraciondoc";
      </script>';
?>
