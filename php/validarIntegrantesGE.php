<?php
session_start();
include '../clases/ConexionTIS.php';
$codUserRep=$_SESSION['coduser'];
$nombres=$_POST['nombres'];
$carnets=$_POST['carnets'];
$telefonos=$_POST['telefonos'];
$emails=$_POST['emails'];
$fotos=$_POST['fotos'];

for ($fot = 0; $fot < count($nombres); $fot++) {
   if ($fotos[$fot]==NULL) {
      $fotos[$fot]="foto.png";
   }
}
for ($tel = 0; $tel < count($nombres); $tel++) {
   if (trim($telefonos[$tel])==NULL) {
      $telefonos[$tel]=-1;
   }
}
for ($ema = 0; $ema < count($nombres); $ema++) {
   if (trim($emails[$ema])==NULL) {
      $emails[$ema]="*";
   }
}

   echo 'codUser = '.$codUserRep."<br>";
   echo 'nombre Grupo Empresa = '.$_POST['nombreGE']."<br>";
   $nombresVal="'".implode(";", $nombres)."'";
   $carnetsVal="'".implode(";", $carnets)."'";
   $telefonosVal="'".implode(";", $telefonos)."'";
   $emailsVal="'".implode(";", $emails)."'";
   $fotosVal="'".implode(";", $fotos)."'";
   
   $sqlRGEI="SELECT * FROM registro_integrantes('".$_POST['nombreGE']."',".$nombresVal.",".$carnetsVal.",".$telefonosVal.",".$emailsVal.",".$fotosVal.")";
   echo 'SQL = '.$sqlRGEI;
   $conexion=new ConexionTIS();
   $conexion->registrarIntegrantes($_POST['nombreGE'], $nombresVal, $carnetsVal, $telefonosVal, $emailsVal, $fotosVal);
   echo '<script type="text/javascript">
            window.location="controlEstado.php";
         </script>';
    
   
?>