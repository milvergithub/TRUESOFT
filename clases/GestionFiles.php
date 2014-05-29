<?php
class GestionFiles {
   function __construct() {
      
   }
   function validarExtensionImagen($archivo) {
      $extencion=  strtolower(array_pop(explode(".", $archivo)));
      if (($extencion=="jpg")||($extencion=="png")||($extencion=="gif")||($extencion==NULL)) {
         $res=TRUE;
      }
      else {
         $res=FALSE;
      }
      return $res;
   }
   function validarExtensionArchivo($archivo) {
      $extencion=  strtolower(array_pop(explode(".", $archivo)));
      if (($extencion=="pdf")) {
         $res=TRUE;
      }
      else {
         $res=FALSE;
      }
      return $res;
   }
   
   function guardarLogo($archivoLog,$origen) {
      $destino="img/logos/".$archivoLog;
      copy($origen, $destino);
   }
   function guardarDocumento($origenDoc,$rutaDestDoc) {
      if ($origenDoc !=NULL) {
         if (file_exists($rutaDestDoc)) {
            unlink($rutaDestDoc);
         }
         copy($origenDoc, $rutaDestDoc);
         chmod($rutaDestDoc,0777);
      }   
   }
}
