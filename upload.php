<?php
session_start();
include 'clases/GestionFiles.php';
include 'clases/ConexionTIS.php';
$nombreDoc=$_POST['nombredoc'];
$codigoDoc=$_POST['codigoDoc'];
$codigoTipo=$_POST['codigoTipo'];
$nombreTipo= $_POST['nombreTip'];
$documento=$_FILES['archivo']['name'];
$origen=$_FILES['archivo']['tmp_name'];
$destino= "files/empresas/".$nombreDoc.".pdf";

$gestionArchEmp=new GestionFiles();
$conex = new ConexionTIS();
if ($gestionArchEmp->validarExtensionArchivo($documento)==TRUE) {
    $gestionArchEmp->guardarDocumento($origen,$destino);
    $conex->insertarArchivosEmp($_SESSION['coduser'],$codigoDoc, $nombreDoc, $destino,$nombreTipo);
    echo "<script type='text/javascript'>
			alert('El documento se subio correctamente');
   		  </script>";
}
else{
    echo "<script type='text/javascript'>
			alert('Error al copiar el documento !!!');
   		  </script>";
}
?>
<br>    
<meta http-equiv="Refresh" content="0;url=index.php?propuestas">
