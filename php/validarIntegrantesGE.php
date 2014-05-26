<?php
session_start();
include '../clases/RegistroTIS.php';
$codUserRep=$_SESSION['coduser'];
$nombres=$_POST['nombres'];
$carnets=$_POST['carnets'];
$telefonos=$_POST['telefonos'];
$emails=$_POST['emails'];
$fotos=$_FILES['fotos']['name'];


if($fotos==NULL) {
   $fotos="foto.png";
}
else{
   
}
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
   $fotosVal=$fotos;
$registroI=new RegistroTIS();
if ($registroI->verificarCIUnicoIntegrante($carnetsVal,$_POST['nombreGE'])=="t") {
   if ($registroI->cuantosIntegrantesTieneEmpresa($_POST['nombreGE'])<5) {
      $conexion=new ConexionTIS();
      $conexion->registrarIntegrantes($_POST['nombreGE'], $nombresVal, $carnetsVal, $telefonosVal, $emailsVal, $fotosVal);
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
