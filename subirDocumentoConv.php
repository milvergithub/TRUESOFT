<?php
$codConv = 1; //cramos el codigo de la convocatoria
include 'clases/GestionFiles.php';
$gestion=new GestionFiles();

include 'clases/ConexionTIS.php';
$conex = new ConexionTIS();

  $nombDoc = $_POST['nombredoc'];
  $archivo = $_FILES["archivo"]['name'];
  $origenDoc = $_FILES['archivo']['tmp_name'];
  $destino =  "files/convocatorias/".$nombDoc.".pdf";
  echo 'nonbre anterior del archivoes: '.$archivo.'<br>';
  echo 'docum= '.$nombDoc.'<br>';
  echo 'prueba= '.$origenDoc.'<br>';
  echo 'destino es: '.$destino.'<br>';
  
  $esvalido = $gestion->validarExtensionArchivo($archivo);
  if($esvalido == TRUE){
      $gestion->guardarDocumento($origenDoc, $destino);
      $conex->subirDocumentos($codConv, $nombDoc, 0, 0, $destino);
      echo 'documento copiado con exito';
    }else{
        echo 'el formato del archivo no es pdf';
    }
?>
<br>    
<a href="crearDocumento.php">Volver atras</a>
