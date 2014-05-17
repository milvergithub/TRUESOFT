<?php
include '../clases/GestionFiles.php';
include '../clases/GestionDocumentos.php';
$gestionDoc=new GestionDocumentos();
$gestion=new GestionFiles();
$conexGD=new ConexionTIS();

$nombre=$_POST['nombre'];
$tipos=$_POST['tipo'];
$nota=$_POST['calificacion'];
$documento=$_FILES['documento']['name'];

$origenDoc=$_FILES['documento']['tmp_name'];
$destino="../files/convocatorias/".$nombre.".pdf";
if ($origenDoc==NULL) {
   $destino="nulo";
}
echo 'nombre ='.$nombre."<br>";
echo 'tipo ='.$tipos."<br>";
echo 'calificacion ='.$nota."<br>";
echo 'nombre Doc ='.$documento."<br>";

if ($nota>=0) {
   if ($gestionDoc->verificarNombreDocUnicoConv(1, $nombre)=='t') {
      if ((($gestionDoc->dameTotalNota(1))+$nota)<=100) {
         $conexGD->subirDocumentos(1, $nombre,$_POST['tipo'] , $nota, $destino);
         $gestion->guardarDocumento($origenDoc, $destino);
      }
      else{
         echo '<div class="alert alert-danger col-lg-8">
                  La nota total es superior a los 100 puntos
               </div>';
      }
   }
   else{
      echo '<div class="alert alert-danger col-lg-8">
               El nombre del archivo debe ser unico por convocatoria
            </div>';
   }
}
else{
   echo '<div class="alert alert-danger col-lg-8">
            No esta permitido una nota negativa !!!
         </div>';
}

/*
if ($gestion->validarExtensionArchivo($documento)==TRUE) {
   
}
else{
   echo '<div class="alert alert-danger col-lg-8">
            tipo de documento no es valido debe ser un archivo de tipo PDF
         </div>';
}
*/
?>
