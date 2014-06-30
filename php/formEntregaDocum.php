<?php
   include 'clases/GestionDocumentos.php';
   $gest = new GestionDocumentos();
?>
<div class="col-lg-12 panel panelaso">
   <br/>
   <div class="panel titulo"><h2>Publicacion De Documentacion De La Empresa</h2></div>
   <div id="mensajeUploadDocumentacion"></div>
      <div class="container container-fluid col-lg-12">
           <?php
           if ($gest->verificarLimiteEntregaDocumentacion($_SESSION['coduser'])=='t') {
              $codConv=$gest->obtenerCodigoConvocatoriaLimiteEntreDoc($_SESSION['coduser']);
              $gest->dameTodoDocumentoSubidaDumentacion($codConv);
           }
           else{
           ?>
              <div class="alert alert-danger">
                 Lo sentimos la fecha limite de la entrega documentos ya expiro !!!<br/>
                 el ultimo dia de entrega de documentos fue
                 <?php echo  "<strong class='h4'>".($gest->dameFechaLimiteDocumentacion($_SESSION['coduser']))."</strong>"; ?>
                 O usted no tiene registrada su grupo empresa...
                 <br/><br/><br/><br/>
              </div>
           <?php
           }
           ?>
      </div>
</div>