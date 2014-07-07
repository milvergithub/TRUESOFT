<?php
//error_reporting(E_ALL^E_NOTICE^E_STRICT);
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
   // ======================== para validar la extencion del archivo en formato zip ===========================
   function validarExtensionArchivoDocumentacion($archivo) {
      $extencion=  strtolower(array_pop(explode(".", $archivo)));
      if (($extencion=="zip")) {
         $res=TRUE;
      }
      else {
         $res=FALSE;
      }
      return $res;
   }
}
