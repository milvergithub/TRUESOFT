<?php
include '../clases/GestionDocumentos.php';
include '../clases/GestionFiles.php';
$gestionDoc=new GestionDocumentos();
$gestion=new GestionFiles();
$conexGD=new ConexionTIS();

$codConv=$gestionDoc->dameUltimaConvocatoria();

$conex = new ConexionTIS();
  $nombDoc = $_POST['nombredoc'];
  $archivo = $_FILES["archivo"]['name'];
  $origenDoc = $_FILES['archivo']['tmp_name'];
  $destino =  "../files/convocatorias/".$nombDoc.$codConv.".pdf";
  $destinoReal="files/convocatorias/".$nombDoc.$codConv.".pdf"; 
  $esvalido = $gestion->validarExtensionArchivo($archivo);
  if($esvalido == TRUE){
      $gestion->guardarDocumento($origenDoc, $destino);
      $conex->subirDocumentos($codConv, $nombDoc, 0, 0, $destinoReal);
      echo '<div class="alert alert-success">
               Documento se subio con exito...
            </div>';
    }else{
        echo '<div class="alert alert-danger">
               el formato del archivo no es PDF <br/>
               o usted no subio ningun archivo...!!! 
              </div>';
    }
?>


