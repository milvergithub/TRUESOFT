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
   function dameTodoDocumentosConvActual($codConv) {
      $resultadoDTDCA=  $this->conexion->dameDocumentosSubidosPorLaConvocatoria($codConv);
      while ($regDTDCA = pg_fetch_assoc($resultadoDTDCA)) {
         echo '<tr>
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
               <a href="'.$regDTDCA['ruta'].'" class="btn btn-link">Descargar<span class="glyphicon glyphicon-download-alt"></span></a>
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
                   '.$regDTDL['nombdoc'].' 
                </td>
                <td>
                    '.$regDTDL['rutadoc'].'
                </td>
                <td>
                    <a href="'.$regDTDL['rutadoc'].'" class="btn btn-link">Descargar <span class="glyphicon glyphicon-download-alt"></span></a>
                </td>
            </tr>';
       }
   }
   
   function  dameTodoDocumentoSubida($codConv)
   {
       $retsultDTDS = $this->conexion->darDocumnetoSubir($codConv);
       while ($restDTDS = pg_fetch_assoc($retsultDTDS)) {
           echo '<form  method="POST" action="upload.php" enctype="multipart/form-data">
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
                           <input name="nombreTip" type="hidden" value="'.$restDTDS['nombtip'].'" />
                           <input class="btn btn-primary btn-sm" name="archivo" type="file" size="35"/><br>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                        </p>
                     </div>
                  </div>
               </form>';
       }
   }
   
   // funcion para dar documentos a configurar
   function darDocumentosConfiguracion($codConv, $codUsu) {
       $retsultDDC = $this->conexion->darDocumnetoSubir($codConv);
       while ($restDDC = pg_fetch_assoc($retsultDDC)) {
           echo '<form  method="POST" action="subirConfiguracionDocumento.php" enctype="multipart/form-data">
                  <div class="col-sm-4 col-md-3">
                     <div class="thumbnail">
                        <img src="img/logos/logo3.jpg" class="img-rounded col-sm-10 col-md-10" alt="Generic placeholder thumbnail"/>
                     </div>
                     <div class="caption">
                           <h3>'.$restDDC['nombdoc'].'</h3>
                           <h4>'.$restDDC['nombtip'].'</h4>
                           <input name="codigoDoc" type="hidden" value="'.$restDDC['coddoc'].'"/>
                           <input name="codigoTip" type="hidden" value="'.$restDDC['codtip'].'"/>
                           <input name="codigoUsuario" type="hidden" value="'.$codUsu.'"/>
                           <p>
                           <h4>Asignar Nota</h4>
                           <input class="form-control col-lg-1" type="text" name="nota" placeholder="'.$restDDC['nota'].'"/><br>
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
           echo '<form  method="POST" action="subirEvaluacionArchivoEmpresa.php" enctype="multipart/form-data">
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
           echo '<form  method="POST" action="subirEvaluacionGrupalEmpresa.php" enctype="multipart/form-data">
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
                           <input class="form-control col-lg-1" type="text" name="nota" placeholder="nota"/><br>
                           <input class="btn btn-primary" name="enviar" type="submit" value="Subir" />
                        </p>
                     </div>
                  </div>
                </form>';
       }
   }
}
?>