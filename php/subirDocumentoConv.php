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
  echo 'nonbre anterior del archivoes: '.$archivo.'<br>';
  echo 'docum= '.$nombDoc.'<br>';
  echo 'prueba= '.$origenDoc.'<br>';
  echo 'destino es: '.$destino.'<br>';
  
  $esvalido = $gestion->validarExtensionArchivo($archivo);
  if($esvalido == TRUE){
      $gestion->guardarDocumento($origenDoc, $destino);
      $conex->subirDocumentos($codConv, $nombDoc, 0, 0, $destinoReal);
      echo 'documento copiado con exito';
    }else{
        echo 'el formato del archivo no es pdf';
    }
?>
