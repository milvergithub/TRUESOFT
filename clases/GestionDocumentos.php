<?php
include 'ConexionTIS.php';

/**
 * @author milver
 */
class GestionDocumentos {
   private $conexion;
   public function __construct() {
      $this->conexion=new ConexionTIS();
   }
   function dameDocumentosTipoPresentacion() {
      $resultado=  $this->conexion->dameDocumetosPresentacion();
      while ($regDDTP = pg_fetch_assoc($resultado)) {
         echo '<option value="'.$regDDTP['codigo'].'">'.$regDDTP['nombre'].'</option>';
      }
   }
   function verificarLimiteEntregaPropuesta($codUser) {
      $resultadoVLED=  $this->conexion->verificarFechaLimiteEntrega($codUser);
      while ($regVLED = pg_fetch_assoc($resultadoVLED)) {
         $resVLED=$regVLED['limite'];
      }
      return $resVLED;
   }
   function verificarLimiteEntregaDocumentacion($codUser) {
      $resultadoVLED=  $this->conexion->dameFechaLimiteEntregaDocumentacion($codUser);
      while ($regVLED = pg_fetch_assoc($resultadoVLED)) {
         $resVLED=$regVLED['limite'];
      }
      return $resVLED;
   }
   function obtenerCodigoConvocatoriaLimiteEntreDoc($codUser) {
      $resultadoOCCLED=  $this->conexion->verificarFechaLimiteEntrega($codUser);
      while ($regOCCLED = pg_fetch_assoc($resultadoOCCLED)) {
         $resOCCLED=$regOCCLED['codconv'];
      }
      return $resOCCLED;
   }
   function obtenerFechaLimiteDocumentos($codUser) {
      $resultadoOFLD=  $this->conexion->verificarFechaLimiteEntrega($codUser);
      while ($regOFLD = pg_fetch_assoc($resultadoOFLD)) {
         $resOFLD=$regOFLD['fechalim'];
      }
      return $resOFLD;
   }
   function dameTodoDocumentosConvActual($codConv) {
      $resultadoDTDCA=  $this->conexion->dameDocumentosSubidosPorLaConvocatoria($codConv);
      while ($regDTDCA = pg_fetch_assoc($resultadoDTDCA)) {
         echo '<tr>
            <td>
               <img src="img/iconos/iconoPDF2.png" width="50" height="50"/>
            </td>
            <td>
               '.$regDTDCA['nombre'].'
            </td>
            <td>
               '.$regDTDCA['tipo'].'
            </td>
            <td>
               '.$regDTDCA['nota'].'
            </td>
            <td>
               '.$regDTDCA['ruta'].'
            </td>
            <td>
               <a href="'.$regDTDCA['ruta'].'" class="btn btn-link">Descargar <span class="glyphicon glyphicon-download-alt"></span></a>
            </td>
            <td>
               <a href="index.php?editardocumentoentrega&nombre='.$regDTDCA['nombre'].'&tipo='.$regDTDCA['tipo'].'&nota='.$regDTDCA['nota'].'&ruta='.$regDTDCA['ruta'].'" 
               class="btn btn-link">Editar <span class="glyphicon glyphicon-edit"></span></a>
            </td>
         </tr>';
      }
   }
   function verificarNombreDocUnicoConv($codConv,$nombre) {
      $resultadoVNDUC=  $this->conexion->verificarDocumentoUnico($codConv, $nombre);
      while ($regVNDUC = pg_fetch_assoc($resultadoVNDUC)) {
         $resVNDUC=$regVNDUC['existe'];
      }
      return $resVNDUC;
   }
   function dameTotalNota($codConv) {
      $resultadoDTN=  $this->conexion->obtenerNotaTotalConv($codConv);
      while ($regDTN = pg_fetch_assoc($resultadoDTN)) {
         $resDTN=$regDTN['notatotal'];
      }
      return $resDTN;
   }
   function dameTodoDocumentosLectura($codConv){
       $resultadoDTDL=  $this->conexion->dameDocumentosLectura($codConv);
       while ($regDTDL = pg_fetch_assoc($resultadoDTDL)) {
           echo '<tr>
                     <td>
                        <img src="img/iconos/iconoPDF2.png" width="50" height="50"/>
                     </td>
                     <td>
                        '.$regDTDL['nombdoc'].' 
                     </td>
                     <td>
                         '.$regDTDL['rutadoc'].'
                     </td>
                     <td>
                         <a href="'.$regDTDL['rutadoc'].'" class="btn btn-link">Descargar <span class="glyphicon glyphicon-download-alt h4"></span></a>
                     </td>
                     <td>
                         <a href="index.php?editardocumentolectura&nombre='.$regDTDL['nombdoc'].'&ruta='.$regDTDL['rutadoc'].'" 
                         class="btn btn-link">Editar <span class="glyphicon glyphicon-edit h4"></span></a>
                     </td>
                 </tr>';
       }
   }
   
   function  dameTodoDocumentoSubida($codConv)
   {
       $retsultDTDS = $this->conexion->darDocumnetoSubir($codConv);
       $contador=1;
       //action="upload/upload.php"
       while ($restDTDS = pg_fetch_assoc($retsultDTDS)) {
           echo '<form method="POST" action="javascript:uploadPropuestas('.$contador.')" enctype="multipart/form-data">
                  <div class="well col-xs-8 col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/iconos/iconoPDF1.png" class="img-rounded col-xs-8 col-sm-12 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                        <h3>'.$restDTDS['nombdoc'].'</h3>
                        <p>'.$restDTDS['nombtip'].'.</p>
                        <p>
                           <input name="codigoDoc'.$contador.'" id="codigoDoc'.$contador.'" type="hidden" value="'.$restDTDS['coddoc'].'"/>
                           <input name="nombredoc'.$contador.'" id="nombredoc'.$contador.'" type="hidden" value="'.$restDTDS['nombdoc'].'"/>
                           <input name="codigoTipo'.$contador.'" id="codigoTipo'.$contador.'" type="hidden" value="'.$restDTDS['codtip'].'" />
                           <input name="nombreTip'.$contador.'" id="nombreTip'.$contador.'" type="hidden" value="'.$restDTDS['nombtip'].'" />
                           <input class="btn btn-primary btn-sm" name="archivo'.$contador.'" id="archivo'.$contador.'" type="file"/>
                           <input type="submit" value="subir" class="btn btn-primary input-sm" />
                        </p>
                     </div>
                  </div>
               </form>';
           $contador=$contador+1;
       }
   }
   
   // funcion para dar documentos a configurar
   function darDocumentosConfiguracion($codConv, $codUsu) {
       $retsultDDC = $this->conexion->darDocumnetoSubir($codConv);
       while ($restDDC = pg_fetch_assoc($retsultDDC)) {
           echo '<form class="" method="POST" action="php/subirConfiguracionDocumento.php" enctype="multipart/form-data">
                  <div class="col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/iconos/iconoPDF.png" class="img-rounded col-sm-10 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                           <h3></h3>
                           <h3>'.$restDDC['nombdoc'].'</h3>
                           <h4>'.$restDDC['nombtip'].'</h4>
                           <input name="codigoDoc" type="hidden" value="'.$restDDC['coddoc'].'"/>
                           <input name="codigoTip" type="hidden" value="'.$restDDC['codtip'].'"/>
                           <input name="codigoUsuario" type="hidden" value="'.$codUsu.'"/>
                           <p>
                           <h4>Asignar Nota</h4>
                           <input class="form-control col-lg-1 numerico" type="text" name="nota" placeholder="'.$restDDC['nota'].'"/><br>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Actualizar" />
                           </p>
                     </div>
                  </div>
               </form>';
       }
   }
   // funcion para evaluar archivos de la empresa
   function evaluarArchivosEmpresa($codConv) {
       $retsultDTDS = $this->conexion->darDocumnetoSubir($codConv);
       while ($restDTDS = pg_fetch_assoc($retsultDTDS)) {
           echo '<form class="" method="POST" action="subirEvaluacionArchivoEmpresa.php" enctype="multipart/form-data">
                  <div class="col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/logos/logo3.jpg" class="img-rounded col-sm-10 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                        <h3>'.$restDTDS['nombdoc'].'</h3>
                        <p>'.$restDTDS['nombtip'].'.</p>
                        <p>
                           <input name="codigoDoc" type="hidden" value="'.$restDTDS['coddoc'].'"/>
                           <input name="nombredoc" type="hidden" value="'.$restDTDS['nombdoc'].'"/>
                           <input name="codigoGest" type="hidden" value="'.$restDTDS['codgest'].'"/>
                           <input name="codigoTipo" type="hidden" value="'.$restDTDS['codtip'].'" />
                           <input class="btn btn-primary btn-sm" name="archivo" type="file" size="35"/><br>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                        </p>
                     </div>
                  </div>
               </form>';
       }
   }
   
   //funcion para cargar archivos de cada empresa
   function devolverArchivoEmpresa($codEmp) {
       $resultDAE = $this->conexion->devolverArchivosEmpresa($codEmp);
       
       while ($restDAE = pg_fetch_assoc($resultDAE)) {
           echo '<form  method="POST" action="php/subirEvaluacionGrupalEmpresa.php" enctype="multipart/form-data">
                  <div class="col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/logos/logo3.jpg" class="img-rounded col-sm-10 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                        <h3>'.$restDAE['nombrearch'].'</h3>
                        <p> Parte: '.$restDAE['partearch'].'</p>
                        <p>
                           <input name="codigoArch" type="hidden" value="'.$restDAE['codarch'].'"/>
                           <input name="codEmp" type="hidden" value="'.$codEmp.'" />
                           <input class="form-control col-lg-1 numerico" type="text" name="nota" placeholder="nota"/><br>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                        </p>
                     </div>
                  </div>
                </form>';
       }
   }
   function dameUltimaConvocatoria() {
      $resultadoDCUC=  $this->conexion->dameCodigoUltimaConvocatoria();
      while ($regDCUC = pg_fetch_assoc($resultadoDCUC)) {
         $resDCUC=$regDCUC['ultimo'];
      }
      return $resDCUC;
   }
   /*==============================    BEGIN GESTION DOCUMENTACION     ============================*/
   function verificarFechaLimiteDocumentacion($codUser) {
      $resultadoDCUC=  $this->conexion->dameFechaLimiteEntregaDocumentacion($codUser);
      while ($regDCUC = pg_fetch_assoc($resultadoDCUC)) {
         $resDCUC=$regDCUC['limite'];
      }
      return $resDCUC;
   }
   function dameFechaLimiteDocumentacion($codUser) {
      $resultadoDFLD=  $this->conexion->dameFechaLimiteEntregaDocumentacion($codUser);
      while ($regDFLD = pg_fetch_assoc($resultadoDFLD)) {
         $resDFLD=$regDFLD['fechalim'];
      }
      return $resDFLD;
   }
   function dameDocumentosDocumentacionEntrega($codConv) {
      $resultadoDDDE=  $this->conexion->dameDocumentacionAEntregar($codConv);
      $contador=1;
      while ($regDDDE = pg_fetch_assoc($resultadoDDDE)) {
         echo '<form name="formularioSubidaDocumentacion" action="php/subirValidarDocumentacion.php" method="post" id="formularioSubidaDocumentacion'.$contador.'">
                    <div class="col-sm-4 col-md-3">
                        <div class="thumbnail">
                            <img src="img/logos/logo3.jpg" class="img-rounded col-sm-10 col-md-10" />
                        </div>
                        <div class="caption">
                            <h3>'.$regDDDE['nombredoc'].'</h3>
                            <p class="h3">'.$regDDDE['nombretipo'].'</p>
                            <p> <h3>nota : '.$regDDDE['notadoc'].'</h3></p>
                            <p>
                                <input name="codigoDoc" type="hidden" value="'.$regDDDE['coddoc'].'"/>
                                <input name="codigoTipo" type="hidden" value="'.$regDDDE['codtipo'].'" />
                                <input class="btn btn-primary" type="file" name="archivo"/>
                                <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                            </p>
                        </div>
                    </div>
               </form>';
         $contador=$contador+1;
      }
   }
   /*==============================    FINAL GESTION DOCUMENTACION     ============================*/
   
   
   
   //funcion para cargar archivos de cada empresa
   function devolverArchivoEmpresaDocumentacion($codEmp) {
       $resultDAED = $this->conexion->dameArchivosDocumentacion($codEmp);
       
       while ($restDAED = pg_fetch_assoc($resultDAED)){
           echo '<form  method="POST" action="subirEvaluacionGrupalEmpresa.php" enctype="multipart/form-data">
                  <div class="col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/logos/logo3.jpg" class="img-rounded col-sm-10 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                            <h3>'.$restDAED['nombrearch'].'</h3>
                            <p>'.$restDAED['partearch'].'</p>
                            <p>
                           <input name="codigoArch" type="hidden" value="'.$restDAED['codarch'].'"/>
                           <input name="codEmp" type="hidden" value="'.$codEmp.'" />
                           <input class="form-control col-lg-1" type="text" name="nota" placeholder="nota"/><br>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                        </p>
                     </div>
                  </div>
                </form>';
       }
   }
   //=============================================================================================================
   //
   //============================================ para la entrega de documentos ==================================
   function  dameTodoDocumentoSubidaDumentacion($codConv)
   {
       $retsultDTDS = $this->conexion->darDocumnetoSubirDocumentacion($codConv);
       $contador=1;
       while ($restDTDS = pg_fetch_assoc($retsultDTDS)) {//action="javascript:uploadDocumentacion('.$contador.')"
           echo '<form  method="POST" action="javascript:uploadDocumentacion('.$contador.')" enctype="multipart/form-data">
                  <div class="col-xs-6 col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/iconos/documentacion.png" class="img-rounded col-xs-12 col-sm-10 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                        <h3>'.$restDTDS['nombdoc'].'</h3>
                        <p>'.$restDTDS['nombtip'].'.</p>
                        <p>
                           <input name="codigoDoc'.$contador.'" id="codigoDoc'.$contador.'" type="hidden" value="'.$restDTDS['coddoc'].'"/>
                           <input name="nombredoc'.$contador.'" id="nombredoc'.$contador.'" type="hidden" value="'.$restDTDS['nombdoc'].'"/>
                           <input name="codigoGest'.$contador.'" id="codigoGest'.$contador.'" type="hidden" value="'.$restDTDS['codgest'].'"/>
                           <input name="codigoTipo'.$contador.'" id="codigoTipo'.$contador.'" type="hidden" value="'.$restDTDS['codtip'].'" />
                           <input name="nombreTip'.$contador.'" id="nombreTip'.$contador.'" type="hidden" value="'.$restDTDS['nombtip'].'" />
                           <input name="codigoConv'.$contador.'" id="codigoConv'.$contador.'" type="hidden" value="'.$codConv.'" />
                           <input name="codigoEmp'.$contador.'" id="codigoEmp'.$contador.'" type="hidden" value="'.$codEmp.'" />    
                           <input name="archivo'.$contador.'" id="archivo'.$contador.'" type="file" class="btn btn-primary btn-sm" size="35"/>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                        </p>
                     </div>
                  </div>
               </form>';
           $contador=$contador+1;
       }
   }
   //=================================================================================================================
   //
   // funcion para poder ver las notas de toda la grupo empresa ======================================================
   function verNotasGrupoEmp($codEmp) {
       $resulDTDI = $this->conexion->dameTodoDatoIntegrante($codEmp);
       while ($resDTDI = pg_fetch_assoc($resulDTDI)) {
           $this->darNotas($codEmp, $resDTDI['codinteg'], $resDTDI['nombreinteg']);
       }
   }
   
   function darNotas($codEmp, $codInteg, $nombInteg) {
       $resulNFI = $this->conexion->notasFinalesIntegrantes($codEmp, $codInteg);
       while ($resNFI = pg_fetch_assoc($resulNFI)) {
           echo '<tr>
                    <td>
                        '.$nombInteg.'
                    </td>
                    
                    <td>
                        '.$resNFI['notagrup'].'
                    </td>
                    
                    <td>
                        '.$resNFI['notaind'].'
                    </td>
                    
                    <td>
                        0
                    </td>
                    
                    <td>
                        '.$resNFI['notadef'].'
                    </td>
                    
                    <td>
                        '.$resNFI['notafinal'].'
                    </td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
                </tr>';
       }
   }
   
  // el de arriba es mas suabe ================================================================= 
   function darNotaPorIntegrante($codEmp, $codInteg) {
       $resulNFI = $this->conexion->notasFinalesIntegrantes($codEmp, $codInteg);
       while ($resNFI = pg_fetch_assoc($resulNFI)) {
        echo '<td>
                '.$resNFI['notagrup'].'
            </td>
            <td>
                '.$resNFI['notaind'].'
            </td>
            <td>
                '.$resNFI['notadef'].'
            </td>
            <td>
                '.$resNFI['notafinal'].'
            </td>';
       }
   }
  // ===============================================================================================================================
   
   // ===================================== para los grupos =========================================================================
   function dameGrupoOcupados() {
       $resulDGO = $this->conexion->dameGruposOcupados();
       while ($resDGO = pg_fetch_assoc($resulDGO)) {
        echo '<tr>
            <td>
                '.$resDGO['nrogrup'].'
            </td>
            <td>
                '.$resDGO['nombusu'].'
            </td>
            <td>
                '.$resDGO['rolusu'].'
            </td>
            </tr>';
       }
   }
   
   function dameGrupoLibres() {
       $resulDGL = $this->conexion->dameGruposLibres();
       while ($resDGL = pg_fetch_assoc($resulDGL)) {
        echo '<tr>
                  <form  class="form-group" method="GET" enctype="multipart/form-data">
                  <td>
                      '.$resDGL['nrogrup'].'
                  </td>
                  <td>
                      por designar
                  </td>
                  <td>
                      <input type="hidden" name="codgrupo" value="'.$resDGL['codgrup'].'" />
                      <input class="btn btn-primary" name="formhorario" type="submit" value="Asignar Horarios" onclick="this.form.action = index.php?formhorario"/> 
                  </td>
                  </form>
                  <form  class="form-group" method="POST" action="php/eliminarGrupo.php" enctype="multipart/form-data">
                  <td>
                      <input type="hidden" name="codgrupo" value="'.$resDGL['codgrup'].'"/>
                      <input type="submit" name="submit" value="Eliminar" class="btn btn-link"> 
                  </td>
                  </form>
                  </tr>';
       }
   }
   function verificarGrupoExistencia($grupo) {
      $resultadoVRU=  $this->conexion->verificandoGrupo($grupo);
      while ($regVGU = pg_fetch_assoc($resultadoVRU)) {
         $resVGU=$regVGU['unicog'];
      }
      return $resVGU;
   }
   // =================================================================================================================================
  
}
?>
