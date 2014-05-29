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
   if (formatoValidoLogo($_FILES['logo']['name'])) {
      $_SESSION['nombreGE']=$_POST['nombreGE'];
      $extencion=  strtolower(array_pop(explode(".", $_FILES['logo']['name'])));
      if ($_FILES['logo']['name'] !=NULL){
         $imagen=$_POST['nombreGE'].".".$extencion;
         $subida=new GestionFiles();
         $subida->guardarDocumento($_FILES['logo']['tmp_name'],"../img/logos/".$imagen);
      }
      else{
         $imagen="defecto.png";
      }
      $conexx=new ConexionTIS();
      $conexx->registroEmpresaAndContrato($_SESSION['coduser'], $_POST['nombreGE'], "img/logos/".$imagen);
      echo "<div class='alert alert-success col-lg-12'>
               registro realizado bienvenido<strong class='h4'> se redirecionara en 5 segundos </strong>!!!
               <script language='JavaScript'>
                  setTimeout(\"location.href='php/controlEstado.php'\", 5000);
               </script>
            </div>";
   }
   else{
       echo "<div class='alert alert-danger col-lg-12'>
               El formato de la imagen no es valida suba con formato JPG,PNG o GIF !!!
            </div>";
   }
   
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

