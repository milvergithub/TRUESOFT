<?php
session_start();
include '../clases/GestionFiles.php';
include '../clases/ConexionTIS.php';
$nombreDoc=$_POST['nombredoc'];
$codigoDoc=$_POST['codigoDoc'];
$codigoGest=$_POST['codigoGest'];
$codigoTipo=$_POST['codigoTipo'];
$nombreTipo= $_POST['nombreTip'];
$documento=$_FILES['archivo']['name'];
$origen=$_FILES['archivo']['tmp_name'];


$conex = new ConexionTIS();
$resultadoSS=$conex->dameCodigoEmpresa($_SESSION['coduser']);
while ($regDCE = pg_fetch_assoc($resultadoSS)) {
   $codEmp=$regDCE['codemp'];
}
$codConv = $_POST['codigoConv'];

$destino= "../files/empresas/".$nombreDoc.$codEmp.".zip";
$destinoreal="files/empresas/".$nombreDoc.$codEmp.".zip";
$gestionArchEmp=new GestionFiles();
$conex = new ConexionTIS();
if ($gestionArchEmp->validarExtensionArchivoDocumentacion($documento)==TRUE) {
    $gestionArchEmp->guardarDocumento($origen,$destino);//coduser,coddoc ,nombre, ruta, parte 
    $conex->insertarArchivosEmp($_SESSION['coduser'], $codigoDoc, $nombreDoc, $destinoreal,$nombreTipo);
    echo '<div class="alert alert-success">
            Archivo subido correctamente...!!!
         </div>';
}
else{
   echo '<div class="alert alert-danger">
            error al copiar el archivo debe ser de formato .zip ...!!! o no subio ningun archivo...
         </div>';
}
?>
