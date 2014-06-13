<?php
include '../clases/ConexionTIS.php';
echo 'DIA ='.$_POST['dia']."<br>";
echo 'DIA ='.$_POST['codigogrupo']."<br>";
echo 'HORARIO ='.$_POST['horario'];
$conexionHorario=new ConexionTIS();
$conexionHorario->horarioSaveHorarioElegido($_POST['codigogrupo'], $_POST['horario'], $_POST['dia']);
echo '<script type="text/javascript">
         window.history.back();
      </script>';
?>
