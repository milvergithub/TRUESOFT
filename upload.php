<?php
include 'clases/GestionFiles.php';
include 'clases/ConexionTIS.php';
$nombreDoc=$_POST['nombredoc'];
$codigoDoc=$_POST['codigoDoc'];
$codigoGest=$_POST['codigoGest'];
$codigoTipo=$_POST['codigoTipo'];
$nombreTipo= $_POST['nombreTip'];
$documento=$_FILES['archivo']['name'];
$origen=$_FILES['archivo']['tmp_name'];
$destino= "files/empresas/".$nombreDoc.".pdf";

$codEmpresa=4;
$codConvocatoria=1;

$gestionArchEmp=new GestionFiles();
$conex = new ConexionTIS();
if ($gestionArchEmp->validarExtensionArchivo($documento)==TRUE) {
    $gestionArchEmp->guardarDocumento($origen,$destino);
    $conex->insertarArchivosEmp($codEmpresa, $codigoGest, $codConvocatoria, $codigoDoc, $nombreDoc, $destino,$nombreTipo);
    echo 'se copio con exito';
}
else{
    echo 'error al copiar el archivo';
}
?>

<br>    
<a href="evaluacionpropuesta.php">Volver atras</a>
