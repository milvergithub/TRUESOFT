<?php
session_start();
include '../clases/GrupoEmpresas.php';
include '../clases/GestionFiles.php';
$ge=new GrupoEmpresa();
$existe=$ge->getUnicoEmpresa($_POST['nombreGE']);
if (($existe=="t") |($_POST['nombreGE']=="")|(validarNombre($_POST['nombreGE']))) {
   echo "<div class='alert alert-danger col-lg-12'>
               El nombre de la grupo empresa ya esta siendo usada !!!
            </div>";
}
else{
   $_SESSION['nombreGE']=$_POST['nombreGE'];
   $conexx=new ConexionTIS();
   $conexx->registroEmpresaAndContrato($_SESSION['coduser'], $_POST['nombreGE'], $_FILES['logo']['name']);
   
}
function validarNombre($p) {
   $p=  ltrim($p,"");
   $p= rtrim($p,"");
   if ($p=="") {
      $res=TRUE;
   }
   else{
      $res=FALSE;
   }
   return $res;
}
function formatoValidoLogo($imagen) {
   $gestionfiles=new GestionFiles();
   if ($gestionfiles->validarExtensionImagen($imagen)) {
      return TRUE;
   }
   else{
      return FALSE;
   }
}
?>

