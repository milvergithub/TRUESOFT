<?php
include '../clases/ConexionTIS.php';
$conexionRemoverHH=new ConexionTIS();
$conexionRemoverHH->horarioRemove($_POST['codigohora']);
echo '<script type="text/javascript">
         window.history.back();
      </script>';
?>