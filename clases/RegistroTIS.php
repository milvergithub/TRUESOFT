<?php
include 'ConexionTIS.php';
/**
 * Description of RegistroTIS
 * @author milver
 */
class RegistroTIS {
   
   private $conexion;
   
   function __construct() {
      $this->conexion=new ConexionTIS();
   }
   
   function dameDocentesActivos() {
      $resultadoDDA=  $this->conexion->dameDocentesActivos();
      while ($regDDA = pg_fetch_assoc($resultadoDDA)) {
         echo '<option value="'.$regDDA['codgrupo'].'">'.$regDDA['nombre'].'</option>';
      }
   }
   function usuarioUnico($cadena) {
      $resultadoUU=  $this->conexion->usuarioUnico($cadena);
      while ($regUU = pg_fetch_assoc($resultadoUU)) {
         $resUU=$regUU['valido'];
      }
      return $resUU;
   }
   function emailUnico($cadena) {
      $resultadoEU=  $this->conexion->emailUnico($cadena);
      while ($regEU = pg_fetch_assoc($resultadoEU)) {
         $resEU=$regEU['unico'];
      }
      return $resEU;
   }
   function verificarGrupo($grupo) {
      $resultadoVRU=  $this->conexion->verificandoGrupo($grupo);
      while ($regVGU = pg_fetch_assoc($resultadoVRU)) {
         $resVGU=$regVGU['unicog'];
      }
      return $resVGU;
   }
}
?>
