<?php
include 'ConexionTIS.php';
/**
 *
 * @author milver
 */
class Evaluaciones {
   private $conexion;
   public function __construct() {
      $this->conexion=new ConexionTIS();
   }
   function ImprimirEmpresasAEvaluarArchivos($codGrupo) {
      $resultadoIEAEA=  $this->conexion->obtenerEmpresasParaEvaluarArchivos($codGrupo);
      
      while ($regIEAEA = pg_fetch_assoc($resultadoIEAEA)) {
      ?>
         <form  method="POST" class="form empresa">
            <div class="col-sm-3 col-md-2">
               <div class="thumbnail">
                  <img src="img/logos/logo3.jpg" class="img-rounded col-sm-10 col-md-10" />
               </div>
               <div class="caption">
                  <h3> <?php echo "Nombre Empresa"; ?></h3>
                  <p>
                     <?php
                           echo '<input type="hidden" name="codEmp" value="'.$regIEAEA['codemp'].'"/>';
                     ?>
                     <input class="btn btn-primary" name="grupal" type="submit" value="Grupal" onclick="this.form.action = 'evaluacionGrupalEmpresa.php'"/>
                     <input class="btn btn-primary" name="individual" type="submit" value="Individual"  onclick="this.form.action = 'evaluacionIndividual.php'"/>
                  </p>
               </div>
            </div>
         </form>
      <?php
      
      }
      ?>
   <?php
   }
   function imprimirEvaluacionPersonal($codEmp) {
      $integrantes=  $this->dameIntegrantesDelaEmpresa($codEmp);
      $documentos =  $this->dameDocumentosEntregados($codEmp);
      $documentosPer=  $this->dameDocumentosEntregados($codEmp);
      $cantidad=  pg_affected_rows($documentos);
      echo '<tr><td><h3>integrantes</h3></td>';
      while ($regDoc = pg_fetch_assoc($documentos)) {
         echo "<td>".$regDoc['nombrearch']."</td>";
      }
      echo "</tr>";
      while ($regInt=  pg_fetch_assoc($integrantes)) {
         echo "<tr>";
         echo '<td>'.$regInt['nombres'].'</td>';
         while ($regDocI = pg_fetch_assoc($documentosPer)) {
            echo '<td>
                     <form id="formularioNotaArchivo" class="form" method="POST">
                        <input type="hidden" name="codigoArchivo" value="'.$regDocI['codarch'].'"/>
                        <input type="hidden" name="codigoIntegrante" value="'.$regInt['codinteg'].'"/>
                        <input type="text" name="nota" class="form-control input-sm"/>
                        <input type="submit" value="Evaluar" class="btn btn-primary"/>
                     </form>
                  </td>';
         }
         $documentosPer=  $this->dameDocumentosEntregados($codEmp);
         echo "</tr>";
      }
      
      
   }
   function dameCodigoConvocatoria($codEmp) {
      $resultadoDCC=  $this->conexion->obtenerCodigosApartirDeCodEmp($codEmp);
      while ($regDCC = pg_fetch_assoc($resultadoDCC)) {
         $resDCC=$regDCC['codconv'];
      }
      return $resDCC;
   }
   function dameIntegrantesDelaEmpresa($codEmp) {
      $resultadoDIE=  $this->conexion->dameIntegrantesEmpresa($codEmp);
      return $resultadoDIE;
   }
   function dameDocumentosEntregados($codEmp){
      $resultadoDDE=  $this->conexion->obtenerArchivosEntregados($codEmp);
      return $resultadoDDE;
   }
}
?>

