<?php
include '../clases/GestionDocumentos.php';
$gestionDoc=new GestionDocumentos();
switch ($_POST['categoria']) {
   case "convocatoria":
      $gestionDoc->dameDocumentosDescarga($_POST['codigo'], $_POST['codigo'],$_POST['codigo'], $_POST['cantidad'],"convocatoria",$_POST['cadena']);
      break;
   case "gestion":
      $gestionDoc->dameDocumentosDescarga($_POST['codigo'], $_POST['codigo'],$_POST['codigo'], $_POST['cantidad'],"gestion",$_POST['cadena']);
      break;
   case "tipodocumento":
      $gestionDoc->dameDocumentosDescarga($_POST['codigo'], $_POST['codigo'],$_POST['codigo'], $_POST['cantidad'],"tipo",$_POST['cadena']);
      break;
   default:
      $gestionDoc->dameDocumentosDescarga(0, 0,0, $_POST['cantidad'],$_POST['categoria'],$_POST['cadena']);
      break;
}
?>
