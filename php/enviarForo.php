<?php
session_start();
include '../clases/ConexionTIS.php';
include '../clases/GestionFiles.php';

$archivo = $_FILES["anexo"]['name'];
$origenDoc = $_FILES['anexo']['tmp_name'];
$contenido=$_POST['contenidoForo'];
if ($archivo !=NULL){
   $extencion=  strtolower(array_pop(explode(".", $archivo)));
   $destino =  "../files/foro/archivoForo".date("d-m-y-H:i:s").".".$extencion;
   $destinoReal="files/foro/archivoForo".date("d-m-y-H:i:s").".".$extencion;
}
else{
   $destino =  "../files/foro/archivoForo";
   $destinoReal="files/foro/archivoForo";
}

$gestion=new GestionFiles();
$conexionforo=new ConexionTIS();
try {
   $conexionforo->foroEnviarForo($_SESSION['coduser'], $contenido, $destinoReal);
   $gestion->guardarDocumento($origenDoc, $destino);
} catch (Exception $exc) {
   
}


?>
