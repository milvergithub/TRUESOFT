<?php
session_start();
include '../clases/RegistroTIS.php';
include '../clases/GestionFiles.php';
$codUserRep=$_SESSION['coduser'];
$nombres=$_POST['nombres'];
$carnets=$_POST['carnets'];
$telefonos=$_POST['telefonos'];
$emails=$_POST['emails'];
$fotos=$_FILES['fotos']['name'];

if (trim($telefonos)==NULL) {
   $telefonos=-1;
}
if (trim($emails)==NULL) {
   $emails="*";
}
   $nombresVal=$nombres;
   $carnetsVal=$carnets;
   $telefonosVal=$telefonos;
   $emailsVal=$emails;

if($fotos==NULL) {
   $fotos="foto.png";
}
else{
   $extencion=  strtolower(array_pop(explode(".", $_FILES['fotos']['name'])));
   $fotos=$carnets.".".$extencion;
   $subidaFoto=new GestionFiles();
   if ($subidaFoto->validarExtensionImagen($_FILES['fotos']['name'])) {
      $subidaFoto->guardarDocumento($_FILES['fotos']['tmp_name'],"../img/fotos/".$fotos);
      
   } 
   else 
   {
      echo "<div class='alert alert-danger col-lg-8'>
                  el formato de la imagen no es valida solo son validas con extenciones .JPG, .PNG !!!
               </div>";
   }
   
}

$registroI=new RegistroTIS();    
$minmax=$registroI->MinimoMaximoDeIntegrantes($_SESSION['coduser']);
if ($registroI->verificarCIUnicoIntegrante($carnetsVal,$_POST['nombreGE'])=="t") {
      if ($registroI->cuantosIntegrantesTieneEmpresa($_POST['nombreGE'])<$minmax[1]) {
         $conexion=new ConexionTIS();
         $conexion->registrarIntegrantes($_POST['nombreGE'], $nombresVal, $carnetsVal, $telefonosVal, $emailsVal, $fotos);
         echo "<div class='alert alert-success col-lg-8'>
                  Registro realizado !!!
               </div>";
      }
      else{
         echo "<div class='alert alert-danger col-lg-8'>
                  la cantidad maxima de integrantes es  5 !!!
               </div>";
      }
}
else{
      echo "<div class='alert alert-danger col-lg-8'>
               El numero de carnet ya esta siendo usada!!!
            </div>";
}
?>
