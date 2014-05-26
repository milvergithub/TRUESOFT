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
            <div class="col-sm-5 col-md-3 col-xs-10 ">
               <div class="thumbnail">
                  <?php
                        echo "<img  src='img/logos/logo2.jpg' class='img-rounded col-xs-8 col-sm-10 col-md-10' />";
                  ?>
               </div>
               <div class="caption">
                  <h3> <?php echo $regIEAEA['nombreemp']; ?></h3>
                  <p>
                     <?php
                           echo '<input type="hidden" name="codEmp" value="'.$regIEAEA['codemp'].'"/>';
                     ?>
                     <input class="btn btn-primary" name="grupal" type="submit" value="Grupal" onclick="this.form.action = 'index.php?grupal'"/>
                     <input class="btn btn-primary" name="individual" type="submit" value="Individual"  onclick="this.form.action = 'index.php?individual'"/>
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
         echo "<th>".$regDoc['nombrearch']."</th>";
      }
      echo "</tr>";
      $contador=1;
      while ($regInt=  pg_fetch_assoc($integrantes)) {
         echo "<tr>";
         echo '<th>'.$regInt['nombres'].'</th>';
         while ($regDocI = pg_fetch_assoc($documentosPer)) {
            echo '<td>
                     <form action="php/procesarNota.php" class="form" name="formularioEvaluacionIndividual" method="POST" id="formularioEvaluacionIndividual'.$contador.'">
                        <input type="hidden" name="codigoArchivo" value="'.$regDocI['codarch'].'"/>
                        <input type="hidden" name="codigoIntegrante" value="'.$regInt['codinteg'].'"/>
                        <input type="text" name="nota" class="form-control input-sm" id="nota"/>
                        <input type="submit" value="Evaluar" class="btn btn-primary"/>
                     </form>
                  </td>';
            $contador=$contador+1;
         }
         $documentosPer=  $this->dameDocumentosEntregados($codEmp);
         echo "</tr>";
      }
      
      echo '<td colspan="'.($cantidad+1).'">(*) Integrantes de la grupo empresa</td>';
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

