<?php
include '../clases/ConexionTIS.php';
if (trim($_POST['nota'])=="") {
   echo '<div class="alert alert-danger">
            ingrese una nota...!!!
         </div>';
}
else{
   $conexINA=new ConexionTIS();
   $conexINA->insertarNotaArchivosEntrega($_POST['codigoArchivo'], $_POST['codigoIntegrante'], $_POST['nota']);
   echo '<div class="alert alert-success">
            nota = <b>'.$_POST['nota'].'</b>
         </div>';
}

?>

