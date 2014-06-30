<?php
session_start();
include '../clases/GestionFiles.php';
include '../clases/ConexionTIS.php';
$nombreDoc=$_POST['nombredoc'];
$codigoDoc=$_POST['codigoDoc'];
$codigoTipo=$_POST['codigoTipo'];
$nombreTipo= $_POST['nombreTip'];
$documento=$_FILES['archivo']['name'];
$origen=$_FILES['archivo']['tmp_name'];
$gestionArchEmp=new GestionFiles();
$conex = new ConexionTIS();
$resultadoDCE=$conex->dameCodigoEmpresa($_SESSION['coduser']);
while ($regDCE = pg_fetch_assoc($resultadoDCE)) {
   $codemp=$regDCE['codemp'];
}
$destino= "../files/empresas/".$nombreDoc.$codemp.".pdf";
$destinoreal="files/empresas/".$nombreDoc.$codemp.".pdf";
if ($gestionArchEmp->validarExtensionArchivo($documento)==TRUE) {
    $gestionArchEmp->guardarDocumento($origen,$destino);
    $conex->insertarArchivosEmp($_SESSION['coduser'],$codigoDoc, $nombreDoc, $destinoreal,$nombreTipo);
    echo '
         <div class="alert alert-success">
            <h4> <b>el archivo se subio y registro de manera correcta</b></h4>
         </div>';
}
else{
   echo '<div class="alert alert-danger"><h4><b>Error... el formato de archivo no es valido procure que sea pdf'
   . '<br/> '.$documento.' no es pdf</b></h4></div>';
}
?>