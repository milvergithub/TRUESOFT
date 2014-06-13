<?php
if (isset($_REQUEST['RegistroEmpresaAIntegrantes'])) {
   
}
else {
include 'ConexionTIS.php';   
}

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
   /*=============================  INICIO REGISTRO INTEGRANTES ====================================*/
   function verificarCIUnicoIntegrante($numero,$nombreGE) {
      $resultadoVCIUI=  $this->conexion->verificarUnicoCarnetIntegrante($numero,$nombreGE);
      while ($regVCIUI = pg_fetch_assoc($resultadoVCIUI)) {
         $resVCIUI=$regVCIUI['unico'];
      }
      return $resVCIUI;
   }
   function dameCodigoEmpresaANombre($nombre) {
      $resultadoDCEAN=  $this->conexion->dameCodigoEmpresaANombre($nombre);
      while ($regDCEAN = pg_fetch_assoc($resultadoDCEAN)) {
         $resDCEAN=$regDCEAN['codemp'];
      }
      return $resDCEAN;
   }
   function dameIntegrantesRegistrados($nombre) {
      $codEmp=  $this->dameCodigoEmpresaANombre($nombre);
      $resultadoDIR=  $this->conexion->dameIntegrantesRegistrados($codEmp);
      while ($regDIR = pg_fetch_assoc($resultadoDIR)) {
            echo '<tr><td>
                     <img width="50" height="50" src="img/fotos/'.$regDIR['foto'].'" /></td>
                  <td>
                     '.$regDIR['nombres'].'
                  </td>
                  <td>
                     '.$regDIR['carnet'].'
                  </td>
                  <td>
                     73767999
                  </td>
                  <td>
                     milver@gmail.com
                  </td>
                  <td>
                     <a href="" title="Eliminar"><span class="glyphicon glyphicon-trash">eliminar</span></a>
                  </td></tr>';
      }
   }
   function cuantosIntegrantesTieneEmpresa($nombre) {
      $codEmp=  $this->dameCodigoEmpresaANombre($nombre);
      $resultadoCITE=  $this->conexion->siYaSeRegistroIntegrantes($codEmp);
      while ($regCITE = pg_fetch_assoc($resultadoCITE)) {
         $resCITE=$regCITE['existe'];
      }
      return $resCITE;
   }
   function getGrupoDisponiblesDocente() {
      $resultadoGGDD=  $this->conexion->horarioHorarioDisponiblesParaTomar();
      while ($regGGDD = pg_fetch_assoc($resultadoGGDD)) {
         echo '<option value="'.$regGGDD['codgrupo'].'">'.$regGGDD['numero'].'</option>';
      }
   }
   /*=============================  FINAL  REGISTRO INTEGRANTES ====================================*/
}
?>
